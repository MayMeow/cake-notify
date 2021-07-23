<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application[]|\Cake\Collection\CollectionInterface $applications
 */
?>
<div class="applications index content">
    <?= $this->Html->link(__('New Application'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Applications') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('node_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('default_state') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application): ?>
                <tr>
                    <td><?= $this->Number->format($application->id) ?></td>
                    <td><?= $application->has('node') ? $this->Html->link($application->node->name, ['controller' => 'Nodes', 'action' => 'view', $application->node->id]) : '' ?></td>
                    <td><?= h($application->name) ?></td>
                    <td><?= h($application->default_state) ?></td>
                    <td><?= h($application->created) ?></td>
                    <td><?= h($application->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $application->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $application->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $application->id], ['confirm' => __('Are you sure you want to delete # {0}?', $application->id)]) ?>
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
