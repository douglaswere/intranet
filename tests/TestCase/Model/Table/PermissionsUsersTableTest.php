<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissionsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissionsUsersTable Test Case
 */
class PermissionsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissionsUsersTable
     */
    public $PermissionsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PermissionsUsers',
        'app.Permissions',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PermissionsUsers') ? [] : ['className' => PermissionsUsersTable::class];
        $this->PermissionsUsers = TableRegistry::getTableLocator()->get('PermissionsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissionsUsers);

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
