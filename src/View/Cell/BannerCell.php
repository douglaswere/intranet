<?php

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Banner cell
 */
class BannerCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {

    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('News');
        $feature = $this->News->find('all', [
            'contain' => ['Files','Users'],
            'limit' => 1,
            'order' => ['News.id' => 'DESC']
        ])->where(['feature ' => '1']);
        $this->set(compact('feature'));
    }
}
