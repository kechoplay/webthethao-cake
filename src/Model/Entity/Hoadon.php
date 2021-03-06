<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hoadon Entity
 *
 * @property int $ord_id
 * @property int $cus_id
 * @property string $name
 * @property string $mobile
 * @property string $address
 * @property float $total
 * @property \Cake\I18n\Time $ord_date
 * @property string $ord_payment
 * @property int $ord_status
 *
 * @property \App\Model\Entity\Ord $ord
 * @property \App\Model\Entity\Khachhang $khachhang
 */
class Hoadon extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */

    public static $PAYMENT = array(
        '0' => 'Thanh toán trực tiếp',
        '1' => 'Thanh toán qua thẻ'
    );

    public static $STATUS = array(
        '0' => 'Chưa xử lí',
        '1' => 'Đang xử lí',
        '2' => 'Đã xử lí'
    );

    public static $STATUS2 = ['Chưa xử lí', 'Đang xử lí', 'Đã xử lí'];

    protected $_accessible = [
        '*' => true,
        'ord_id' => false
    ];
}
