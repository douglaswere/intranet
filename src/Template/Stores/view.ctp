<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Store'), ['action' => 'edit', $store->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Store'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Navmenus'), ['controller' => 'Navmenus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Navmenu'), ['controller' => 'Navmenus', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Store Divisions'), ['controller' => 'StoreDivisions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store Division'), ['controller' => 'StoreDivisions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Store Ipmaps'), ['controller' => 'StoreIpmaps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store Ipmap'), ['controller' => 'StoreIpmaps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Store Returns'), ['controller' => 'StoreReturns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store Return'), ['controller' => 'StoreReturns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Store Sortfield'), ['controller' => 'StoreSortfield', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store Sortfield'), ['controller' => 'StoreSortfield', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Store Vars'), ['controller' => 'StoreVars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store Var'), ['controller' => 'StoreVars', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stores view large-9 medium-8 columns content">
    <h3><?= h($store->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($store->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Store') ?></th>
            <td><?= $store->has('parent_store') ? $this->Html->link($store->parent_store->name, ['controller' => 'Stores', 'action' => 'view', $store->parent_store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($store->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $store->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($store->files)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Blob Id') ?></th>
                <th scope="col"><?= __('Mime Type') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Width') ?></th>
                <th scope="col"><?= __('Height') ?></th>
                <th scope="col"><?= __('Date Created') ?></th>
                <th scope="col"><?= __('Date Accessed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($store->files as $files): ?>
            <tr>
                <td><?= h($files->id) ?></td>
                <td><?= h($files->blob_id) ?></td>
                <td><?= h($files->mime_type) ?></td>
                <td><?= h($files->name) ?></td>
                <td><?= h($files->size) ?></td>
                <td><?= h($files->width) ?></td>
                <td><?= h($files->height) ?></td>
                <td><?= h($files->date_created) ?></td>
                <td><?= h($files->date_accessed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Files', 'action' => 'view', $files->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Files', 'action' => 'edit', $files->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Files', 'action' => 'delete', $files->id], ['confirm' => __('Are you sure you want to delete # {0}?', $files->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Navmenus') ?></h4>
        <?php if (!empty($store->navmenus)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Destination') ?></th>
                <th scope="col"><?= __('Htmlid') ?></th>
                <th scope="col"><?= __('Store Id') ?></th>
                <th scope="col"><?= __('Navmenu Id') ?></th>
                <th scope="col"><?= __('Sort') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($store->navmenus as $navmenus): ?>
            <tr>
                <td><?= h($navmenus->id) ?></td>
                <td><?= h($navmenus->title) ?></td>
                <td><?= h($navmenus->destination) ?></td>
                <td><?= h($navmenus->htmlid) ?></td>
                <td><?= h($navmenus->store_id) ?></td>
                <td><?= h($navmenus->navmenu_id) ?></td>
                <td><?= h($navmenus->sort) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Navmenus', 'action' => 'view', $navmenus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Navmenus', 'action' => 'edit', $navmenus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Navmenus', 'action' => 'delete', $navmenus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $navmenus->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Store Divisions') ?></h4>
        <?php if (!empty($store->store_divisions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Store Id') ?></th>
                <th scope="col"><?= __('Company Code') ?></th>
                <th scope="col"><?= __('Ar Division Number') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($store->store_divisions as $storeDivisions): ?>
            <tr>
                <td><?= h($storeDivisions->id) ?></td>
                <td><?= h($storeDivisions->store_id) ?></td>
                <td><?= h($storeDivisions->company_code) ?></td>
                <td><?= h($storeDivisions->ar_division_number) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StoreDivisions', 'action' => 'view', $storeDivisions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StoreDivisions', 'action' => 'edit', $storeDivisions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StoreDivisions', 'action' => 'delete', $storeDivisions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeDivisions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Store Ipmaps') ?></h4>
        <?php if (!empty($store->store_ipmaps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Store Id') ?></th>
                <th scope="col"><?= __('Ip Address') ?></th>
                <th scope="col"><?= __('Port') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($store->store_ipmaps as $storeIpmaps): ?>
            <tr>
                <td><?= h($storeIpmaps->id) ?></td>
                <td><?= h($storeIpmaps->store_id) ?></td>
                <td><?= h($storeIpmaps->ip_address) ?></td>
                <td><?= h($storeIpmaps->port) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StoreIpmaps', 'action' => 'view', $storeIpmaps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StoreIpmaps', 'action' => 'edit', $storeIpmaps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StoreIpmaps', 'action' => 'delete', $storeIpmaps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeIpmaps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Store Returns') ?></h4>
        <?php if (!empty($store->store_returns)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Store Id') ?></th>
                <th scope="col"><?= __('Company Code') ?></th>
                <th scope="col"><?= __('Return To Address Code') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($store->store_returns as $storeReturns): ?>
            <tr>
                <td><?= h($storeReturns->id) ?></td>
                <td><?= h($storeReturns->store_id) ?></td>
                <td><?= h($storeReturns->company_code) ?></td>
                <td><?= h($storeReturns->return_to_address_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StoreReturns', 'action' => 'view', $storeReturns->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StoreReturns', 'action' => 'edit', $storeReturns->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StoreReturns', 'action' => 'delete', $storeReturns->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeReturns->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Store Sortfield') ?></h4>
        <?php if (!empty($store->store_sortfield)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Store Id') ?></th>
                <th scope="col"><?= __('Sort') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($store->store_sortfield as $storeSortfield): ?>
            <tr>
                <td><?= h($storeSortfield->id) ?></td>
                <td><?= h($storeSortfield->store_id) ?></td>
                <td><?= h($storeSortfield->sort) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StoreSortfield', 'action' => 'view', $storeSortfield->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StoreSortfield', 'action' => 'edit', $storeSortfield->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StoreSortfield', 'action' => 'delete', $storeSortfield->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeSortfield->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Store Vars') ?></h4>
        <?php if (!empty($store->store_vars)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Store Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($store->store_vars as $storeVars): ?>
            <tr>
                <td><?= h($storeVars->id) ?></td>
                <td><?= h($storeVars->store_id) ?></td>
                <td><?= h($storeVars->name) ?></td>
                <td><?= h($storeVars->type) ?></td>
                <td><?= h($storeVars->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StoreVars', 'action' => 'view', $storeVars->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StoreVars', 'action' => 'edit', $storeVars->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StoreVars', 'action' => 'delete', $storeVars->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeVars->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stores') ?></h4>
        <?php if (!empty($store->child_stores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($store->child_stores as $childStores): ?>
            <tr>
                <td><?= h($childStores->id) ?></td>
                <td><?= h($childStores->name) ?></td>
                <td><?= h($childStores->active) ?></td>
                <td><?= h($childStores->parent_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Stores', 'action' => 'view', $childStores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Stores', 'action' => 'edit', $childStores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stores', 'action' => 'delete', $childStores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childStores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
