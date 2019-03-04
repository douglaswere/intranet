<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * News Entity
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $user_id
 * @property bool $feature
 * @property int|null $banner_id
 * @property string|null $banner_css
 * @property \Cake\I18n\FrozenTime $date_submitted
 * @property \Cake\I18n\FrozenTime $date_modified
 * @property \Cake\I18n\FrozenTime|null $date_approved
 * @property \Cake\I18n\FrozenTime|null $date_expires
 * @property string|null $active
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\File[] $files
 * @property \App\Model\Entity\Tag[] $tags
 */
class News extends Entity
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
        'feature' => true,
        'banner_id' => true,
        'banner_css' => true,
        'date_submitted' => true,
        'date_modified' => true,
        'date_approved' => true,
        'date_expires' => true,
        'active' => true,
        'user' => true,
        'files' => true,
        'tags' => true
    ];
}
