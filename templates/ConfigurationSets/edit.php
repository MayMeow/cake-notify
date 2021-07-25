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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $configurationSet->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $configurationSet->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Configuration Sets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="configurationSets form content">
            <?= $this->Form->create($configurationSet) ?>
            <fieldset>
                <legend><?= __('Edit Configuration Set') ?></legend>
                <?php
                    echo $this->Form->control('type');
                    echo $this->Form->control('config_set');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
