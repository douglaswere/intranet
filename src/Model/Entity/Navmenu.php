<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Navmenu Entity
 *
 * @property int $id
 * @property string $title
 * @property string|null $destination
 * @property string $htmlid
 * @property int $store_id
 * @property int|null $navmenu_id
 * @property int $sort
 *
 * @property \App\Model\Entity\Store $store
 * @property \App\Model\Entity\Navmenu[] $navmenus
 */
class Navmenu extends Entity
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
        'destination' => true,
        'htmlid' => true,
        'store_id' => true,
        'navmenu_id' => true,
        'sort' => true,
        'store' => true,
        'navmenus' => true
    ];
}
