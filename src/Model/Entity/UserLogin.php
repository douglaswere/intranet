<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserLogin Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $ip_address
 * @property string|null $browser
 * @property string|null $resolution
 * @property string|null $login_code
 * @property string|null $login_token
 * @property \Cake\I18n\FrozenTime|null $login_token_expires
 * @property string|null $login_remember_me
 * @property \Cake\I18n\FrozenTime|null $login_remember_me_expires
 * @property \Cake\I18n\FrozenTime|null $login_success
 *
 * @property \App\Model\Entity\User $user
 */
class UserLogin extends Entity
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
        'user_id' => true,
        'ip_address' => true,
        'browser' => true,
        'resolution' => true,
        'login_code' => true,
        'login_token' => true,
        'login_token_expires' => true,
        'login_remember_me' => true,
        'login_remember_me_expires' => true,
        'login_success' => true,
        'user' => true
    ];
}
