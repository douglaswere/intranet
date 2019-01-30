<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsImagesTable Test Case
 */
class NewsImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsImagesTable
     */
    public $NewsImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.NewsImages',
        'app.News'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NewsImages') ? [] : ['className' => NewsImagesTable::class];
        $this->NewsImages = TableRegistry::getTableLocator()->get('NewsImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NewsImages);

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
