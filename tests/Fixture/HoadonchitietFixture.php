<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HoadonchitietFixture
 *
 */
class HoadonchitietFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'hoadonchitiet';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ord_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pro_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'number' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'price' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'pro_id' => ['type' => 'index', 'columns' => ['pro_id'], 'length' => []],
            'ord_id' => ['type' => 'index', 'columns' => ['ord_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ord_id', 'pro_id'], 'length' => []],
            'hoadonchitiet_ibfk_1' => ['type' => 'foreign', 'columns' => ['ord_id'], 'references' => ['hoadon', 'ord_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'hoadonchitiet_ibfk_2' => ['type' => 'foreign', 'columns' => ['pro_id'], 'references' => ['sanpham', 'pro_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'ord_id' => 1,
            'pro_id' => 1,
            'number' => 1,
            'price' => 1
        ],
    ];
}
