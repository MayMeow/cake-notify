<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConfigurationSet[]|\Cake\Collection\CollectionInterface $configurationSets
 */
?>
<div class="configurationSets index content">
    <?= $this->Html->link(__('New SMS Configuration'), ['action' => 'add-twilio'], ['class' => 'button float-right', 'style' => 'margin-left: 5px']) ?>
    <?= $this->Html->link(__('New Configuration Set'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Configuration Sets') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($configurationSets as $configurationSet): ?>
                <tr>
                    <td><?= $this->Number->format($configurationSet->id) ?></td>
                    <td><?= h($configurationSet->type) ?></td>
                    <td><?= h($configurationSet->created) ?></td>
                    <td><?= h($configurationSet->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $configurationSet->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $configurationSet->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $configurationSet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configurationSet->id)]) ?>
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
