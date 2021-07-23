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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $applicationLog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $applicationLog->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Application Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="applicationLogs form content">
            <?= $this->Form->create($applicationLog) ?>
            <fieldset>
                <legend><?= __('Edit Application Log') ?></legend>
                <?php
                    echo $this->Form->control('application_id', ['options' => $applications]);
                    echo $this->Form->control('current_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
