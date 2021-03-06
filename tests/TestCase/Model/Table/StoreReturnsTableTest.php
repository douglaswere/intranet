<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoreReturnsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoreReturnsTable Test Case
 */
class StoreReturnsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StoreReturnsTable
     */
    public $StoreReturns;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.StoreReturns',
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
        $config = TableRegistry::getTableLocator()->exists('StoreReturns') ? [] : ['className' => StoreReturnsTable::class];
        $this->StoreReturns = TableRegistry::getTableLocator()->get('StoreReturns', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StoreReturns);

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
