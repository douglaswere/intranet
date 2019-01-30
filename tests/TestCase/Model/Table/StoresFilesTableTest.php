<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoresFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoresFilesTable Test Case
 */
class StoresFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StoresFilesTable
     */
    public $StoresFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.StoresFiles',
        'app.Stores',
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
        $config = TableRegistry::getTableLocator()->exists('StoresFiles') ? [] : ['className' => StoresFilesTable::class];
        $this->StoresFiles = TableRegistry::getTableLocator()->get('StoresFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StoresFiles);

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
