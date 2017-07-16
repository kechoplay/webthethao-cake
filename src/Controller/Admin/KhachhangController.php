<?php
namespace App\Controller\Admin;

use App\Controller\Admin\App2Controller;

/**
 * Khachhang Controller
 *
 * @property \App\Model\Table\KhachhangTable $Khachhang
 */
class KhachhangController extends App2Controller
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $khachhang = $this->Khachhang->find('all');
//        echo "<pre>";
//        print_r($khachhang);
//        die();
        $this->set(compact('khachhang'));
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
        $this->set(compact('khachhang'));
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
        $khachhang = $this->Khachhang->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $khachhang = $this->Khachhang->patchEntity($khachhang, $this->request->data);
            if ($this->Khachhang->save($khachhang)) {
                $this->Flash->success(__('The khachhang has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The khachhang could not be saved. Please, try again.'));
        }
        $this->set(compact('khachhang'));
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
