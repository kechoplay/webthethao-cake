<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KhachhangTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KhachhangTable Test Case
 */
class KhachhangTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KhachhangTable
     */
    public $Khachhang;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Khachhang') ? [] : ['className' => 'App\Model\Table\KhachhangTable'];
        $this->Khachhang = TableRegistry::get('Khachhang', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Khachhang);

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
