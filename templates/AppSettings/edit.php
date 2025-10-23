<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $appSetting
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appSetting->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appSetting->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List App Settings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="appSettings form content">
            <?= $this->Form->create($appSetting) ?>
            <fieldset>
                <legend><?= __('Edit App Setting') ?></legend>
                <?php
                    echo $this->Form->control('config_key');
                    echo $this->Form->control('value');
                    echo $this->Form->control('type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
