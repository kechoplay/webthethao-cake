<?php

namespace App\Controller\Admin;

use App\Controller\Admin\App2Controller;
use App\Model\Entity\Hoadon;

/**
 * Hoadon Controller
 *
 * @property \App\Model\Table\HoadonTable $Hoadon
 */
class HoadonController extends App2Controller
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->set('status',Hoadon::$STATUS);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Khachhang']
        ];
        $hoadon = $this->Hoadon->find('all')->orderAsc('ord_status');
//        debug($hoadon);
//        die;
        $this->set('hoadon',$hoadon);
        $this->set('title', 'Danh sách hóa đơn');
    }

    /**
     * View method
     *
     * @param string|null $id Hoadon id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hoadon = $this->Hoadon->get($id, [
            'contain' => ['Khachhang']
        ]);

        $this->set('hoadon', $hoadon);
        $this->set('_serialize', ['hoadon']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hoadon id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hoadon = $this->Hoadon->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hoadon = $this->Hoadon->patchEntity($hoadon, $this->request->data);
            if ($this->Hoadon->save($hoadon)) {
                $this->Flash->success(__('The hoadon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hoadon could not be saved. Please, try again.'));
        }
        $khachhang = $this->Hoadon->Khachhang->find('list', ['limit' => 200]);
        $this->set(compact('hoadon', 'khachhang'));
        $this->set('_serialize', ['hoadon']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hoadon id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hoadon = $this->Hoadon->get($id);
        if ($this->Hoadon->delete($hoadon)) {
            $this->Flash->success(__('The hoadon has been deleted.'));
        } else {
            $this->Flash->error(__('The hoadon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
