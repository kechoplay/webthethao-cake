<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HoadonchitietTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HoadonchitietTable Test Case
 */
class HoadonchitietTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HoadonchitietTable
     */
    public $Hoadonchitiet;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hoadonchitiet',
        'app.hoadon',
        'app.khachhang',
        'app.sanpham',
        'app.danhmuc'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Hoadonchitiet') ? [] : ['className' => 'App\Model\Table\HoadonchitietTable'];
        $this->Hoadonchitiet = TableRegistry::get('Hoadonchitiet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hoadonchitiet);

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
