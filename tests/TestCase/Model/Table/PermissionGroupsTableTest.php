<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissionGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissionGroupsTable Test Case
 */
class PermissionGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissionGroupsTable
     */
    public $PermissionGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PermissionGroups',
        'app.Permissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PermissionGroups') ? [] : ['className' => PermissionGroupsTable::class];
        $this->PermissionGroups = TableRegistry::getTableLocator()->get('PermissionGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissionGroups);

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
}
