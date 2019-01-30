<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Store Entity
 *
 * @property int $id
 * @property string $name
 * @property bool $active
 * @property int|null $parent_id
 *
 * @property \App\Model\Entity\Store $parent_store
 * @property \App\Model\Entity\Navmenu[] $navmenus
 * @property \App\Model\Entity\StoreDivision[] $store_divisions
 * @property \App\Model\Entity\StoreIpmap[] $store_ipmaps
 * @property \App\Model\Entity\StoreReturn[] $store_returns
 * @property \App\Model\Entity\StoreSortfield[] $store_sortfield
 * @property \App\Model\Entity\StoreVar[] $store_vars
 * @property \App\Model\Entity\Store[] $child_stores
 * @property \App\Model\Entity\File[] $files
 */
class Store extends Entity
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
        'name' => true,
        'active' => true,
        'parent_id' => true,
        'parent_store' => true,
        'navmenus' => true,
        'store_divisions' => true,
        'store_ipmaps' => true,
        'store_returns' => true,
        'store_sortfield' => true,
        'store_vars' => true,
        'child_stores' => true,
        'files' => true
    ];
}
