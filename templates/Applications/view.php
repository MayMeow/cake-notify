<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Application'), ['action' => 'edit', $application->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Application'), ['action' => 'delete', $application->id], ['confirm' => __('Are you sure you want to delete # {0}?', $application->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Applications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Application'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="applications view content">
            <h3><?= h($application->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Node') ?></th>
                    <td><?= $application->has('node') ? $this->Html->link($application->node->name, ['controller' => 'Nodes', 'action' => 'view', $application->node->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($application->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Default State') ?></th>
                    <td><?= h($application->default_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($application->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($application->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($application->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($application->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Application Logs') ?></h4>
                <?php if (!empty($application->application_logs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Application Id') ?></th>
                            <th><?= __('Current State') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($application->application_logs as $applicationLogs) : ?>
                        <tr>
                            <td><?= h($applicationLogs->id) ?></td>
                            <td><?= h($applicationLogs->application_id) ?></td>
                            <td><?= h($applicationLogs->current_state) ?></td>
                            <td><?= h($applicationLogs->created) ?></td>
                            <td><?= h($applicationLogs->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ApplicationLogs', 'action' => 'view', $applicationLogs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ApplicationLogs', 'action' => 'edit', $applicationLogs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ApplicationLogs', 'action' => 'delete', $applicationLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicationLogs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
