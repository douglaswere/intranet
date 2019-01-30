<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoreVar Entity
 *
 * @property int $id
 * @property int|null $store_id
 * @property string|null $name
 * @property string $type
 * @property string $value
 *
 * @property \App\Model\Entity\Store $store
 */
class StoreVar extends Entity
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
        'store_id' => true,
        'name' => true,
        'type' => true,
        'value' => true,
        'store' => true
    ];
}
