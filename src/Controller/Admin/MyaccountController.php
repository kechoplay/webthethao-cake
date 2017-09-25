<?php
/**
 * Created by PhpStorm.
 * User: New-User
 * Date: 9/25/2017
 * Time: 1:51 PM
 */
namespace App\Controller\Admin;

use App\Controller\Admin\App2Controller;
use Cake\ORM\TableRegistry;

/**
 * Khachhang Controller
 *
 * @property \App\Model\Table\KhachhangTable $Khachhang
 */
class MyaccountController extends App2Controller
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $account = TableRegistry::get('admin')->find('all');
//        echo "<pre>";
//        print_r($khachhang);
//        die();
        $this->set(compact('account'));
        $this->set('title','Thông tin cá nhân');
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
