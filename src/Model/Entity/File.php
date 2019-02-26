<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * File Entity
 *
 * @property int $id
 * @property string $src
 * @property string $path
 * @property string $type
 * @property string $mime_type
 * @property string $name
 * @property int $size
 * @property int|null $width
 * @property int|null $height
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime $date_accessed
 *
 * @property \App\Model\Entity\News[] $news
 * @property \App\Model\Entity\Store[] $stores
 */
class File extends Entity
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
        'src' => true,
        'path' => true,
        'type' => true,
        'mime_type' => true,
        'name' => true,
        'size' => true,
        'width' => true,
        'height' => true,
        'date_created' => true,
        'date_accessed' => true,
        'news' => true,
        'stores' => true
    ];
}
