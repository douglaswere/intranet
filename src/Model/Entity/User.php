<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property string|null $title
 * @property string|null $department
 * @property string|null $location
 * @property string|null $time_zone
 * @property int|null $manager_id
 * @property string $ldapid
 * @property bool $active
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Announcement[] $announcements
 * @property \App\Model\Entity\News[] $news
 * @property \App\Model\Entity\UserContact[] $user_contacts
 * @property \App\Model\Entity\UserLogin[] $user_logins
 * @property \App\Model\Entity\Permission[] $permissions
 * @property \App\Model\Entity\Role[] $roles
 */
class User extends Entity
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
        'username' => true,
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'title' => true,
        'department' => true,
        'location' => true,
        'time_zone' => true,
        'manager_id' => true,
        'ldapid' => true,
        'active' => true,
        'user' => true,
        'announcements' => true,
        'news' => true,
        'user_contacts' => true,
        'user_logins' => true,
        'permissions' => true,
        'roles' => true
    ];
}
