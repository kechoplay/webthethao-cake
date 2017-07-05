<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sanpham Entity
 *
 * @property int $pro_id
 * @property int $cat_id
 * @property string $pro_name
 * @property float $pro_price
 * @property float $pro_discount
 * @property string $pro_image
 * @property string $pro_description
 * @property int $pro_quantity
 * @property int $pro_count_buy
 * @property int $pro_view
 * @property bool $pro_status
 *
 * @property \App\Model\Entity\Pro $pro
 * @property \App\Model\Entity\Danhmuc $danhmuc
 */
class Sanpham extends Entity
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
        'pro_id' => false
    ];
}
