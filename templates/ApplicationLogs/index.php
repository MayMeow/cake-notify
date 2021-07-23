<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ApplicationLog[]|\Cake\Collection\CollectionInterface $applicationLogs
 */
?>
<div class="applicationLogs index content">
    <?= $this->Html->link(__('New Application Log'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Application Logs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('application_id') ?></th>
                    <th><?= $this->Paginator->sort('current_state') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applicationLogs as $applicationLog): ?>
                <tr>
                    <td><?= $this->Number->format($applicationLog->id) ?></td>
                    <td><?= $applicationLog->has('application') ? $this->Html->link($applicationLog->application->name, ['controller' => 'Applications', 'action' => 'view', $applicationLog->application->id]) : '' ?></td>
                    <td><?= h($applicationLog->current_state) ?></td>
                    <td><?= h($applicationLog->created) ?></td>
                    <td><?= h($applicationLog->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $applicationLog->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $applicationLog->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $applicationLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicationLog->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
