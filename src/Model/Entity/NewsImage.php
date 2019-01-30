<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NewsImage Entity
 *
 * @property int $id
 * @property int $news_id
 * @property string|null $name
 * @property int|null $size
 * @property string|null $tmp_name
 * @property string|null $height
 * @property string|null $width
 * @property string|null $feature
 * @property string|null $url
 *
 * @property \App\Model\Entity\News $news
 */
class NewsImage extends Entity
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
        'id' => true,
        'news_id' => true,
        'name' => true,
        'size' => true,
        'tmp_name' => true,
        'height' => true,
        'width' => true,
        'feature' => true,
        'url' => true,
        'news' => true
    ];
}
