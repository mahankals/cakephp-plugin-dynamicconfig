<?php

declare(strict_types=1);

namespace DynamicConfig\Controller;

use DynamicConfig\Controller\AppController;
use Cake\Http\Exception\ForbiddenException;

/**
 * AppSettings Controller
 *
 * @property \DynamicConfig\Model\Table\AppSettingsTable $AppSettings
 */
class AppSettingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->AppSettings->find();
        $appSettings = $this->paginate($query);
        $id = $this->request->getParam('id') ?? $this->request->getQuery('id') ?? null;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $appSetting = $this->AppSettings->get($id, contain: []);
            $appSetting = $this->AppSettings->patchEntity($appSetting, $this->request->getData());
            if ($this->AppSettings->save($appSetting)) {
                $this->Flash->success(__('The app setting has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The app setting could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('appSettings', 'id'));
    }
}
