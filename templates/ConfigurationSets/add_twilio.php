<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Form\TwilioConfgurationSetForm $twilioForm
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Configuration Sets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="configurationSets form content">
            <?= $this->Form->create($twilioForm) ?>
            <fieldset>
                <legend><?= __('Add Twilio Configuration Set') ?></legend>
                <?php
                echo $this->Form->control('sid');
                echo $this->Form->control('token');
                echo $this->Form->control('sender');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
