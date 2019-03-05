<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

/**
 * StripTags behavior
 */
class StripTagsBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public function initialize(array $config)
    {
        // Some initialization code here
    }

    public function removeTag($value)
    {
        return strip_tags($value);
    }
}
