<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Admin Entity
 *
 * @property int $id
 * @property string $user
 * @property string $pass
 * @property string $fullname
 * @property string $email
 * @property int $level
 * @property int $status
 * @property \Cake\I18n\Time $created_at
 * @property \Cake\I18n\Time $last_access
 */
class Admin extends Entity
{

    public $level = array(
        '0' => '--Chọn quyền truy cập--',
        '1' => 'Administrator',
        '2' => 'Manager'
    );

    public $status = array(
        '0' => '--Chọn trạng thái--',
        '1' => 'Hiện',
        '2' => 'Ẩn'
    );

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
        'id' => false
    ];

    protected function _setPassword($value)
    {
        $hasher=new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
