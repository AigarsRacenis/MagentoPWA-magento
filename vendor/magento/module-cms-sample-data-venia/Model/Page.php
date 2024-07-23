<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\CmsSampleDataVenia\Model;

use Magento\Cms\Model\PageFactory;
use Magento\Framework\File\Csv;
use Magento\Framework\Setup\SampleData\Context as SampleDataContext;
use Magento\Framework\Setup\SampleData\FixtureManager;
use Magento\Store\Model\Store;

class Page
{
    public const HOMEPAGE_IDENTIFIER = 'venia-new-home';

    /**
     * @var FixtureManager
     */
    private $fixtureManager;

    /**
     * @var Csv
     */
    protected $csvReader;

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @param SampleDataContext $sampleDataContext
     * @param PageFactory $pageFactory
     */
    public function __construct(
        SampleDataContext $sampleDataContext,
        PageFactory $pageFactory
    ) {
        $this->fixtureManager = $sampleDataContext->getFixtureManager();
        $this->csvReader = $sampleDataContext->getCsvReader();
        $this->pageFactory = $pageFactory;
    }

    /**
     * Install data via csv files
     *
     * @param array $fixtures
     * @throws \Exception
     */
    public function install(array $fixtures)
    {
        foreach ($fixtures as $fileName) {
            $fileName = $this->fixtureManager->getFixture($fileName);
            if (!file_exists($fileName)) {
                continue;
            }

            $rows = $this->csvReader->getData($fileName);
            $header = array_shift($rows);

            foreach ($rows as $row) {
                $data = [];
                foreach ($row as $key => $value) {
                    $data[$header[$key]] = $value;
                }
                $row = $data;

                /** @var \Magento\Cms\Model\Page $page */
                $page = $this->pageFactory->create();
                $page->load($row['identifier'], 'identifier');
                $page->addData($row);
                $page->setCustomLayoutUpdateXml(null);
                $page->setStores([Store::DEFAULT_STORE_ID]);
                $page->save();
            }
        }
    }
}
