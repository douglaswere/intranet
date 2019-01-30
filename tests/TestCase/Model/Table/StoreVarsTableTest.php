<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoreVarsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoreVarsTable Test Case
 */
class StoreVarsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StoreVarsTable
     */
    public $StoreVars;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.StoreVars',
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
        $config = TableRegistry::getTableLocator()->exists('StoreVars') ? [] : ['className' => StoreVarsTable::class];
        $this->StoreVars = TableRegistry::getTableLocator()->get('StoreVars', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StoreVars);

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
