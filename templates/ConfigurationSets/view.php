<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConfigurationSet $configurationSet
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Configuration Set'), ['action' => 'edit', $configurationSet->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Configuration Set'), ['action' => 'delete', $configurationSet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configurationSet->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Configuration Sets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Configuration Set'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="configurationSets view content">
            <h3><?= h($configurationSet->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($configurationSet->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($configurationSet->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($configurationSet->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($configurationSet->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
