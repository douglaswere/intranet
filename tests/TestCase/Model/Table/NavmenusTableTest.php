<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NavmenusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NavmenusTable Test Case
 */
class NavmenusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NavmenusTable
     */
    public $Navmenus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Navmenus',
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
        $config = TableRegistry::getTableLocator()->exists('Navmenus') ? [] : ['className' => NavmenusTable::class];
        $this->Navmenus = TableRegistry::getTableLocator()->get('Navmenus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Navmenus);

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
