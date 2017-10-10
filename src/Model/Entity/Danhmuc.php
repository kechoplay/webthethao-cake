<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Danhmuc Entity
 *
 * @property int $cat_id
 * @property string $cat_name
 * @property int $parent_id
 * @property int $sort_order
 * @property bool $cat_status
 *
 * @property \App\Model\Entity\Cat $cat
 * @property \App\Model\Entity\Danhmuc $parent_danhmuc
 * @property \App\Model\Entity\Danhmuc[] $child_danhmuc
 */
class Danhmuc extends Entity
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

    public static $STATUS = ['Ẩn', 'Hiển thị'];

    protected $_accessible = [
        '*' => true,
        'cat_id' => false
    ];
}
