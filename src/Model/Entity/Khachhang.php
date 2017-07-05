<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Khachhang Entity
 *
 * @property int $cus_id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property string $email
 * @property string $mobile
 * @property string $address
 * @property bool $status
 *
 * @property \App\Model\Entity\Cus $cus
 */
class Khachhang extends Entity
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
        'cus_id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}