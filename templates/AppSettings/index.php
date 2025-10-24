<?php

use Cake\Core\Configure;

/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $appSettings
 */
?>
<div class="appSettings index content">
    <h3><?= __('App Settings ') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('config_key') ?></th>
                    <th><?= $this->Paginator->sort('value') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appSettings as $appSetting): ?>
                    <tr>
                        <td><?= $this->Number->format($appSetting->id) ?></td>
                        <td><?= h($appSetting->config_key) ?></td>
                        <td>
                            <?php if ($id == $appSetting->id): ?>
                                <?= $this->Form->create($appSetting) ?>
                                <?= $this->Form->control('value', ['label' => false]) ?>
                                <?= $this->Form->button(__('Submit')) ?>
                                <?= $this->Html->link(__('Cancel'), [
                                    'controller' => $this->request->getParam('controller'),
                                    'action' => $this->request->getParam('action')
                                ], ['class' => 'button secondary']) ?>
                                <?= $this->Form->end() ?>
                            <?php else: ?>
                                <?= h($appSetting->value) ?>
                                <?= $this->Html->link(__('Edit'), ['?' => ['id' => $appSetting->id]], ['class' => 'float-right']) ?>
                            <?php endif; ?>
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