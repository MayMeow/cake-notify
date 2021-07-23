<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Node[]|\Cake\Collection\CollectionInterface $nodes
 */
?>
<div class="nodes index content">
    <?= $this->Html->link(__('New Node'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Nodes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nodes as $node): ?>
                <tr>
                    <td><?= $this->Number->format($node->id) ?></td>
                    <td><?= h($node->name) ?></td>
                    <td><?= h($node->created) ?></td>
                    <td><?= h($node->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $node->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $node->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $node->id], ['confirm' => __('Are you sure you want to delete # {0}?', $node->id)]) ?>
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
