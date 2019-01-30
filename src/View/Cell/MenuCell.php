<?php

namespace App\View\Cell;

use Cake\ORM\TableRegistry;
use Cake\View\Cell;
use Cake\Datasource\Paginator;

/**
 * Menu cell
 */
class MenuCell extends Cell
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
        /**
        limit to the number of menu items to display to keep the user interface in check
         */

        $paginator = new Paginator();
        $query = TableRegistry::getTableLocator()->get('Navmenus')->find('all')
            ->contain(['Stores', 'Parentmenu', 'Childmenus'])
        ->where(['Navmenus.navmenu_id'=>'1']);
        $menus = $paginator->paginate($query);
        $this->set('menu', $menus);

    }
}
