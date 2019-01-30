<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsFilesTable Test Case
 */
class NewsFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsFilesTable
     */
    public $NewsFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.NewsFiles',
        'app.News',
        'app.Files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NewsFiles') ? [] : ['className' => NewsFilesTable::class];
        $this->NewsFiles = TableRegistry::getTableLocator()->get('NewsFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NewsFiles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
