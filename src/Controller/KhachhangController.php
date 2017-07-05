<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Khachhang Controller
 *
 * @property \App\Model\Table\KhachhangTable $Khachhang
 */
class KhachhangController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cuses']
        ];
        $khachhang = $this->paginate($this->Khachhang);

        $this->set(compact('khachhang'));
        $this->set('_serialize', ['khachhang']);
    }

    /**
     * View method
     *
     * @param string|null $id Khachhang id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $khachhang = $this->Khachhang->get($id, [
            'contain' => ['Cuses']
        ]);

        $this->set('khachhang', $khachhang);
        $this->set('_serialize', ['khachhang']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $khachhang = $this->Khachhang->newEntity();
        if ($this->request->is('post')) {
            $khachhang = $this->Khachhang->patchEntity($khachhang, $this->request->data);
            if ($this->Khachhang->save($khachhang)) {
                $this->Flash->success(__('The khachhang has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The khachhang could not be saved. Please, try again.'));
        }
        $cuses = $this->Khachhang->Cuses->find('list', ['limit' => 200]);
        $this->set(compact('khachhang', 'cuses'));
        $this->set('_serialize', ['khachhang']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Khachhang id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $khachhang = $this->Khachhang->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $khachhang = $this->Khachhang->patchEntity($khachhang, $this->request->data);
            if ($this->Khachhang->save($khachhang)) {
                $this->Flash->success(__('The khachhang has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The khachhang could not be saved. Please, try again.'));
        }
        $cuses = $this->Khachhang->Cuses->find('list', ['limit' => 200]);
        $this->set(compact('khachhang', 'cuses'));
        $this->set('_serialize', ['khachhang']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Khachhang id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $khachhang = $this->Khachhang->get($id);
        if ($this->Khachhang->delete($khachhang)) {
            $this->Flash->success(__('The khachhang has been deleted.'));
        } else {
            $this->Flash->error(__('The khachhang could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}