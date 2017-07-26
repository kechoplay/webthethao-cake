<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SlideTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SlideTable Test Case
 */
class SlideTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SlideTable
     */
    public $Slide;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.slide',
        'app.slis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Slide') ? [] : ['className' => 'App\Model\Table\SlideTable'];
        $this->Slide = TableRegistry::get('Slide', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Slide);

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
