<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Hoadon Controller
 *
 * @property \App\Model\Table\HoadonTable $Hoadon
 */
class HoadonController extends AppController
{

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
        $hoadon = $this->paginate($this->Hoadon);

        $this->set(compact('hoadon'));
        $this->set('_serialize', ['hoadon']);
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
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hoadon = $this->Hoadon;
        $hoadon_table=$hoadon->newEntity();

        $hoadonchitiet=TableRegistry::get('hoadonchitiet');

        $sanpham=TableRegistry::get('Sanpham');

        $session = $this->request->session();
        if ($this->request->is('post')) {
            $lastid=0;
            $sessioncart = $session->read('cart');
            $cusid = $this->Auth->user('cus_id');
            $data = $this->request->getData();
            $hoadon_table=$hoadon->patchEntity($hoadon_table,$data);
            $hoadon_table->cus_id=$cusid;
            $hoadon_table->total=$hoadon->totalPrice($sessioncart);

            $lastid=$hoadon->save($hoadon_table);
            $hoadonchitiet->addOrderDetail($sessioncart,$lastid->ord_id);

            foreach ($sessioncart as $key => $value) {
                $id = $key;
                $sl = $value['sl'];
                $sanpham->changeQuantityWhenBuy($id,$sl);
            }
            $return = array(
                'success' => 'true',
                'message' => 'Bạn đã mua hàng thành công'
                );
            $session->delete('cart');
            echo json_encode($return);
            die();
        }
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
        $ords = $this->Hoadon->find('list', ['limit' => 200]);
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
