<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoreIpmapsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoreIpmapsTable Test Case
 */
class StoreIpmapsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StoreIpmapsTable
     */
    public $StoreIpmaps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.StoreIpmaps',
        'app.Stores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('StoreIpmaps') ? [] : ['className' => StoreIpmapsTable::class];
        $this->StoreIpmaps = TableRegistry::getTableLocator()->get('StoreIpmaps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StoreIpmaps);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
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
