<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sanpham Controller
 *
 * @property \App\Model\Table\SanphamTable $Sanpham
 */
class SanphamController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pros', 'Danhmuc']
        ];
        $sanpham = $this->paginate($this->Sanpham);

        $this->set(compact('sanpham'));
        $this->set('_serialize', ['sanpham']);
    }

    /**
     * View method
     *
     * @param string|null $id Sanpham id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sanpham = $this->Sanpham->get($id, [
            'contain' => ['Pros', 'Danhmuc']
        ]);

        $this->set('sanpham', $sanpham);
        $this->set('_serialize', ['sanpham']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sanpham = $this->Sanpham->newEntity();
        if ($this->request->is('post')) {
            $sanpham = $this->Sanpham->patchEntity($sanpham, $this->request->data);
            if ($this->Sanpham->save($sanpham)) {
                $this->Flash->success(__('The sanpham has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sanpham could not be saved. Please, try again.'));
        }
        $pros = $this->Sanpham->Pros->find('list', ['limit' => 200]);
        $danhmuc = $this->Sanpham->Danhmuc->find('list', ['limit' => 200]);
        $this->set(compact('sanpham', 'pros', 'danhmuc'));
        $this->set('_serialize', ['sanpham']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sanpham id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sanpham = $this->Sanpham->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sanpham = $this->Sanpham->patchEntity($sanpham, $this->request->data);
            if ($this->Sanpham->save($sanpham)) {
                $this->Flash->success(__('The sanpham has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sanpham could not be saved. Please, try again.'));
        }
        $pros = $this->Sanpham->Pros->find('list', ['limit' => 200]);
        $danhmuc = $this->Sanpham->Danhmuc->find('list', ['limit' => 200]);
        $this->set(compact('sanpham', 'pros', 'danhmuc'));
        $this->set('_serialize', ['sanpham']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sanpham id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sanpham = $this->Sanpham->get($id);
        if ($this->Sanpham->delete($sanpham)) {
            $this->Flash->success(__('The sanpham has been deleted.'));
        } else {
            $this->Flash->error(__('The sanpham could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
