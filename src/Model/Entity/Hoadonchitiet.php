<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hoadonchitiet Entity
 *
 * @property int $ord_id
 * @property int $pro_id
 * @property int $number
 * @property float $price
 *
 * @property \App\Model\Entity\Hoadon $hoadon
 * @property \App\Model\Entity\Sanpham $sanpham
 */
class Hoadonchitiet extends Entity
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
    protected $_accessible = [
        '*' => true,
        'ord_id' => false,
        'pro_id' => false
    ];
}
