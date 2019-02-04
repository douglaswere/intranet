<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Announcements cell
 */
class AnnouncementsCell extends Cell
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
        $this->loadModel('Announcements');
        $query = $this->Announcements->find('all', [
            'limit' => 1,
            'order' => ['Announcements.id' => 'DESC']
        ]);
        $announcement = $query->all();

        $this->set(compact('announcement'));
    }
}
