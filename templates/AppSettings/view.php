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
            <?= $this->Html->link(__('Edit App Setting'), ['action' => 'edit', $appSetting->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete App Setting'), ['action' => 'delete', $appSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appSetting->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List App Settings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New App Setting'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="appSettings view content">
            <h3><?= h($appSetting->key) ?></h3>
            <table>
                <tr>
                    <th><?= __('Config Key') ?></th>
                    <td><?= h($appSetting->config_key) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($appSetting->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($appSetting->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Value') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($appSetting->value)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>