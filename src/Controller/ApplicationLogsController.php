<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ApplicationLogs Controller
 *
 * @property \App\Model\Table\ApplicationLogsTable $ApplicationLogs
 * @method \App\Model\Entity\ApplicationLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicationLogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applications'],
        ];
        $applicationLogs = $this->paginate($this->ApplicationLogs);

        $this->set(compact('applicationLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Application Log id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicationLog = $this->ApplicationLogs->get($id, [
            'contain' => ['Applications'],
        ]);

        $this->set(compact('applicationLog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicationLog = $this->ApplicationLogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $applicationLog = $this->ApplicationLogs->patchEntity($applicationLog, $this->request->getData());
            if ($this->ApplicationLogs->save($applicationLog)) {
                $this->Flash->success(__('The application log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application log could not be saved. Please, try again.'));
        }
        $applications = $this->ApplicationLogs->Applications->find('list', ['limit' => 200]);
        $this->set(compact('applicationLog', 'applications'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Application Log id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicationLog = $this->ApplicationLogs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicationLog = $this->ApplicationLogs->patchEntity($applicationLog, $this->request->getData());
            if ($this->ApplicationLogs->save($applicationLog)) {
                $this->Flash->success(__('The application log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The application log could not be saved. Please, try again.'));
        }
        $applications = $this->ApplicationLogs->Applications->find('list', ['limit' => 200]);
        $this->set(compact('applicationLog', 'applications'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Application Log id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicationLog = $this->ApplicationLogs->get($id);
        if ($this->ApplicationLogs->delete($applicationLog)) {
            $this->Flash->success(__('The application log has been deleted.'));
        } else {
            $this->Flash->error(__('The application log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
