<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Announcements'), ['controller' => 'Announcements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Announcement'), ['controller' => 'Announcements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Contacts'), ['controller' => 'UserContacts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Contact'), ['controller' => 'UserContacts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Logins'), ['controller' => 'UserLogins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Login'), ['controller' => 'UserLogins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($user->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= h($user->department) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($user->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time Zone') ?></th>
            <td><?= h($user->time_zone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $user->has('user') ? $this->Html->link($user->user->title, ['controller' => 'Users', 'action' => 'view', $user->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ldapid') ?></th>
            <td><?= h($user->ldapid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $user->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Permissions') ?></h4>
        <?php if (!empty($user->permissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Permission Group Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->permissions as $permissions): ?>
            <tr>
                <td><?= h($permissions->id) ?></td>
                <td><?= h($permissions->name) ?></td>
                <td><?= h($permissions->description) ?></td>
                <td><?= h($permissions->permission_group_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Permissions', 'action' => 'view', $permissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Permissions', 'action' => 'edit', $permissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Permissions', 'action' => 'delete', $permissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Roles') ?></h4>
        <?php if (!empty($user->roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->roles as $roles): ?>
            <tr>
                <td><?= h($roles->id) ?></td>
                <td><?= h($roles->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Announcements') ?></h4>
        <?php if (!empty($user->announcements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Text') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Priority') ?></th>
                <th scope="col"><?= __('Date Submitted') ?></th>
                <th scope="col"><?= __('Date Approved') ?></th>
                <th scope="col"><?= __('Date Expires') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->announcements as $announcements): ?>
            <tr>
                <td><?= h($announcements->id) ?></td>
                <td><?= h($announcements->title) ?></td>
                <td><?= h($announcements->text) ?></td>
                <td><?= h($announcements->user_id) ?></td>
                <td><?= h($announcements->priority) ?></td>
                <td><?= h($announcements->date_submitted) ?></td>
                <td><?= h($announcements->date_approved) ?></td>
                <td><?= h($announcements->date_expires) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Announcements', 'action' => 'view', $announcements->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Announcements', 'action' => 'edit', $announcements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Announcements', 'action' => 'delete', $announcements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related News') ?></h4>
        <?php if (!empty($user->news)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Text') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Feature') ?></th>
                <th scope="col"><?= __('Date Submitted') ?></th>
                <th scope="col"><?= __('Date Modified') ?></th>
                <th scope="col"><?= __('Date Approved') ?></th>
                <th scope="col"><?= __('Date Expires') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->news as $news): ?>
            <tr>
                <td><?= h($news->id) ?></td>
                <td><?= h($news->title) ?></td>
                <td><?= h($news->text) ?></td>
                <td><?= h($news->user_id) ?></td>
                <td><?= h($news->feature) ?></td>
                <td><?= h($news->date_submitted) ?></td>
                <td><?= h($news->date_modified) ?></td>
                <td><?= h($news->date_approved) ?></td>
                <td><?= h($news->date_expires) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'News', 'action' => 'view', $news->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'News', 'action' => 'edit', $news->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'News', 'action' => 'delete', $news->id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Contacts') ?></h4>
        <?php if (!empty($user->user_contacts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_contacts as $userContacts): ?>
            <tr>
                <td><?= h($userContacts->id) ?></td>
                <td><?= h($userContacts->user_id) ?></td>
                <td><?= h($userContacts->type) ?></td>
                <td><?= h($userContacts->contact) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserContacts', 'action' => 'view', $userContacts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserContacts', 'action' => 'edit', $userContacts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserContacts', 'action' => 'delete', $userContacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userContacts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Logins') ?></h4>
        <?php if (!empty($user->user_logins)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Ip Address') ?></th>
                <th scope="col"><?= __('Browser') ?></th>
                <th scope="col"><?= __('Resolution') ?></th>
                <th scope="col"><?= __('Login Code') ?></th>
                <th scope="col"><?= __('Login Token') ?></th>
                <th scope="col"><?= __('Login Token Expires') ?></th>
                <th scope="col"><?= __('Login Remember Me') ?></th>
                <th scope="col"><?= __('Login Remember Me Expires') ?></th>
                <th scope="col"><?= __('Login Success') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_logins as $userLogins): ?>
            <tr>
                <td><?= h($userLogins->id) ?></td>
                <td><?= h($userLogins->user_id) ?></td>
                <td><?= h($userLogins->ip_address) ?></td>
                <td><?= h($userLogins->browser) ?></td>
                <td><?= h($userLogins->resolution) ?></td>
                <td><?= h($userLogins->login_code) ?></td>
                <td><?= h($userLogins->login_token) ?></td>
                <td><?= h($userLogins->login_token_expires) ?></td>
                <td><?= h($userLogins->login_remember_me) ?></td>
                <td><?= h($userLogins->login_remember_me_expires) ?></td>
                <td><?= h($userLogins->login_success) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserLogins', 'action' => 'view', $userLogins->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserLogins', 'action' => 'edit', $userLogins->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserLogins', 'action' => 'delete', $userLogins->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLogins->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
