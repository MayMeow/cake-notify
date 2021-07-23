<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApplicationLog $applicationLog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Application Log'), ['action' => 'edit', $applicationLog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Application Log'), ['action' => 'delete', $applicationLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicationLog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Application Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Application Log'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="applicationLogs view content">
            <h3><?= h($applicationLog->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Application') ?></th>
                    <td><?= $applicationLog->has('application') ? $this->Html->link($applicationLog->application->name, ['controller' => 'Applications', 'action' => 'view', $applicationLog->application->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Current State') ?></th>
                    <td><?= h($applicationLog->current_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($applicationLog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($applicationLog->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($applicationLog->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
