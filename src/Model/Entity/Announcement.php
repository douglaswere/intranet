<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Announcement Entity
 *
 * @property int $id
 * @property string $title
 * @property string|null $text
 * @property int $user_id
 * @property int $priority
 * @property \Cake\I18n\FrozenTime $date_submitted
 * @property \Cake\I18n\FrozenTime|null $date_approved
 * @property \Cake\I18n\FrozenTime|null $date_expires
 *
 * @property \App\Model\Entity\User $user
 */
class Announcement extends Entity
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
        'title' => true,
        'text' => true,
        'user_id' => true,
        'priority' => true,
        'date_submitted' => true,
        'date_approved' => true,
        'date_expires' => true,
        'user' => true
    ];
}
