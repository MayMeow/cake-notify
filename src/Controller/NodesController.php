<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Nodes Controller
 *
 * @property \App\Model\Table\NodesTable $Nodes
 * @method \App\Model\Entity\Node[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NodesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $nodes = $this->paginate($this->Nodes);

        $this->set(compact('nodes'));
    }

    /**
     * View method
     *
     * @param string|null $id Node id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $node = $this->Nodes->get($id, [
            'contain' => ['Applications'],
        ]);

        $this->set(compact('node'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $node = $this->Nodes->newEmptyEntity();
        if ($this->request->is('post')) {
            $node = $this->Nodes->patchEntity($node, $this->request->getData());
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The node has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The node could not be saved. Please, try again.'));
        }
        $this->set(compact('node'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Node id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $node = $this->Nodes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $node = $this->Nodes->patchEntity($node, $this->request->getData());
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The node has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The node could not be saved. Please, try again.'));
        }
        $this->set(compact('node'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Node id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $node = $this->Nodes->get($id);
        if ($this->Nodes->delete($node)) {
            $this->Flash->success(__('The node has been deleted.'));
        } else {
            $this->Flash->error(__('The node could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
