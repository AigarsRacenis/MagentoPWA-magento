<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\CmsSampleDataVenia\Setup\Patch\Data;

use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Api\Data\BlockInterface;
use Magento\Cms\Api\GetPageByIdentifierInterface;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\CmsSampleDataVenia\Model\Page;
use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Filesystem\Driver\File;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Store\Model\Store;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PersonalizedContentData implements DataPatchInterface
{
    private const NEW_HOMEPAGE_FILE_PATH = '/fixtures/pages/personalizedContent.html';
    private const NEW_BLOCK_IDENTIFIER = 'venia-personalized-content';
    private const NEW_BLOCK_CONTENT = '';
    private const NEW_BLOCK_TITLE = 'Venia Personalized Content';

    /**
     * @var BlockRepositoryInterface
     */
    private $blockRepository;

    /**
     * @var BlockFactory
     */
    private $blockInterfaceFactory;

    /**
     * @var ComponentRegistrar
     */
    private $componentRegistrar;

    /**
     * @var File
     */
    private $fileDriver;

    /**
     * @var GetPageByIdentifierInterface
     */
    private $getPageByIdentifier;

    /**
     * @var PageRepositoryInterface
     */
    private $pageRepository;

    /**
     * @param BlockRepositoryInterface $blockRepository
     * @param BlockFactory $blockInterfaceFactory
     * @param ComponentRegistrar $componentRegistrar
     * @param File $fileDriver
     * @param GetPageByIdentifierInterface $getPageByIdentifier
     * @param PageRepositoryInterface $pageRepository
     */
    public function __construct(
        BlockRepositoryInterface $blockRepository,
        BlockFactory $blockInterfaceFactory,
        ComponentRegistrar $componentRegistrar,
        File $fileDriver,
        GetPageByIdentifierInterface $getPageByIdentifier,
        PageRepositoryInterface $pageRepository
    ) {
        $this->blockRepository = $blockRepository;
        $this->blockInterfaceFactory = $blockInterfaceFactory;
        $this->componentRegistrar = $componentRegistrar;
        $this->fileDriver = $fileDriver;
        $this->getPageByIdentifier = $getPageByIdentifier;
        $this->pageRepository = $pageRepository;
    }

    /**
     * @inheritdoc
     *
     * @throws LocalizedException
     */
    public function apply()
    {
        $this->createCmsBlock();
        $this->updateHomePage();
    }

    /**
     * Create new CMS Block
     *
     * @throws LocalizedException
     */
    public function createCmsBlock()
    {
        /** @var BlockInterface $cmsBlock */
        $cmsBlock = $this->blockInterfaceFactory->create();

        $cmsBlock->setIdentifier(self::NEW_BLOCK_IDENTIFIER);
        $cmsBlock->setContent(self::NEW_BLOCK_CONTENT);
        $cmsBlock->setTitle(self::NEW_BLOCK_TITLE);
        $cmsBlock->setData('stores', [Store::DEFAULT_STORE_ID]);

        $this->blockRepository->save($cmsBlock);
    }

    /**
     * Update Home Page content
     *
     * @throws NoSuchEntityException
     * @throws FileSystemException
     * @throws LocalizedException
     */
    public function updateHomePage()
    {
        $homePage = $this->getPageByIdentifier->execute(Page::HOMEPAGE_IDENTIFIER, Store::DEFAULT_STORE_ID);
        $moduleDir = $this->componentRegistrar->getPath(ComponentRegistrar::MODULE, 'Magento_CmsSampleDataVenia');
        $newHomePageContent = $this->fileDriver->fileGetContents(
            $moduleDir . self::NEW_HOMEPAGE_FILE_PATH
        );

        if ($homePage->getId()) {
            $homePage->setContent($newHomePageContent);
            $this->pageRepository->save($homePage);
        }
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [
            InstallCmsSampleData::class,
            UpdateDefaultData::class
        ];
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }
}
