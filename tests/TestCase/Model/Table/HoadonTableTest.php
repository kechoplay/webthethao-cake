<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HoadonTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HoadonTable Test Case
 */
class HoadonTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HoadonTable
     */
    public $Hoadon;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hoadon',
        'app.ords',
        'app.khachhang',
        'app.cuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Hoadon') ? [] : ['className' => 'App\Model\Table\HoadonTable'];
        $this->Hoadon = TableRegistry::get('Hoadon', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hoadon);

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
