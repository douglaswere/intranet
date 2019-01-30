<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoreDivision Entity
 *
 * @property int $id
 * @property int|null $store_id
 * @property string $company_code
 * @property string $ar_division_number
 *
 * @property \App\Model\Entity\Store $store
 */
class StoreDivision extends Entity
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
        'company_code' => true,
        'ar_division_number' => true,
        'store' => true
    ];
}
