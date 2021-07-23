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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $application->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $application->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Applications'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="applications form content">
            <?= $this->Form->create($application) ?>
            <fieldset>
                <legend><?= __('Edit Application') ?></legend>
                <?php
                    echo $this->Form->control('node_id', ['options' => $nodes]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('default_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
