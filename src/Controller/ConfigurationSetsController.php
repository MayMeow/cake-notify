<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\TwilioConfgurationSetForm;
use App\Shared\Value\ConfigurationSetType;

/**
 * ConfigurationSets Controller
 *
 * @property \App\Model\Table\ConfigurationSetsTable $ConfigurationSets
 * @method \App\Model\Entity\ConfigurationSet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConfigurationSetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $configurationSets = $this->paginate($this->ConfigurationSets);

        $this->set(compact('configurationSets'));
    }

    /**
     * View method
     *
     * @param string|null $id Configuration Set id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $configurationSet = $this->ConfigurationSets->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('configurationSet'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $configurationSet = $this->ConfigurationSets->newEmptyEntity();
        if ($this->request->is('post')) {
            $configurationSet = $this->ConfigurationSets->patchEntity($configurationSet, $this->request->getData());
            if ($this->ConfigurationSets->save($configurationSet)) {
                $this->Flash->success(__('The configuration set has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The configuration set could not be saved. Please, try again.'));
        }
        $this->set(compact('configurationSet'));
    }

    /**
     * @return \Cake\Http\Response|null|void
     */
    public function addTwilio()
    {
        $twilioForm = new TwilioConfgurationSetForm();

        if ($this->request->is('post')) {
            $configurationSet = $this->ConfigurationSets->newEmptyEntity();

            $configurationSet->type = ConfigurationSetType::$twilio;
            $configurationSet->config_set = json_encode($this->request->getData());

            if ($this->ConfigurationSets->save($configurationSet)) {
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('twilioForm'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Configuration Set id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $configurationSet = $this->ConfigurationSets->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $configurationSet = $this->ConfigurationSets->patchEntity($configurationSet, $this->request->getData());
            if ($this->ConfigurationSets->save($configurationSet)) {
                $this->Flash->success(__('The configuration set has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The configuration set could not be saved. Please, try again.'));
        }
        $this->set(compact('configurationSet'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Configuration Set id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $configurationSet = $this->ConfigurationSets->get($id);
        if ($this->ConfigurationSets->delete($configurationSet)) {
            $this->Flash->success(__('The configuration set has been deleted.'));
        } else {
            $this->Flash->error(__('The configuration set could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
