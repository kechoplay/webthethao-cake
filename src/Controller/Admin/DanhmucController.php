<?php

namespace App\Controller\Admin;

use App\Controller\Admin\App2Controller;

/**
 * Danhmuc Controller
 *
 * @property \App\Model\Table\DanhmucTable $Danhmuc
 */
class DanhmucController extends App2Controller
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $danhmuc = ($this->Danhmuc->find('all'));
//        debug($this->Danhmuc->find('all')->count());
//        die();
        $this->set(compact('danhmuc'));
        $this->set('_serialize', ['danhmuc']);
    }

    /**
     * View method
     *
     * @param string|null $id Danhmuc id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $danhmuc = $this->Danhmuc->get($id, [
            'contain' => ['ParentDanhmuc', 'ChildDanhmuc']
        ]);

        $this->set('danhmuc', $danhmuc);
        $this->set('_serialize', ['danhmuc']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $danhmuc = $this->Danhmuc->newEntity();
        if ($this->request->is('post')) {
            $danhmuc = $this->Danhmuc->patchEntity($danhmuc, $this->request->data);
            if ($danhmuc->parent_id==null){
                $danhmuc->parent_id=0;
            }
            if ($this->Danhmuc->save($danhmuc)) {
                $this->Flash->success(__('The danhmuc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The danhmuc could not be saved. Please, try again.'));
        }
        $cats = $this->Danhmuc->find('list', ['limit' => 200]);
        $parentDanhmuc = $this->Danhmuc->find('treelist', ['limit' => 200]);
        $this->set(compact('danhmuc', 'cats', 'parentDanhmuc'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Danhmuc id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $danhmuc = $this->Danhmuc->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $danhmuc = $this->Danhmuc->patchEntity($danhmuc, $this->request->data);
            if ($danhmuc->parent_id==null){
                $danhmuc->parent_id=0;
            }
            if ($this->Danhmuc->save($danhmuc)) {
                $this->Flash->success(__('The danhmuc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The danhmuc could not be saved. Please, try again.'));
        }
        $cats = $this->Danhmuc->find('list', ['limit' => 200]);
        $parentDanhmuc = $this->Danhmuc->find('treelist', ['limit' => 200]);
//        debug(compact('danhmuc', 'cats', 'parentDanhmuc'));
//        die();
        $this->set(compact('danhmuc', 'cats', 'parentDanhmuc'));
//        $this->set('_serialize', ['danhmuc']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Danhmuc id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $danhmuc = $this->Danhmuc->get($id);
        if ($this->Danhmuc->delete($danhmuc)) {
            $this->Flash->success(__('The danhmuc has been deleted.'));
        } else {
            $this->Flash->error(__('The danhmuc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
