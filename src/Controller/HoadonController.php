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

    public function addcart($id)
    {
        $sanpham = TableRegistry::get('sanpham')->find('all')->where(['pro_id' => $id])->toArray();
        $session = $this->request->session();
        $sessioncart = $session->read('cart') ? $session->read('cart') : [];
        if (array_key_exists($id,$sessioncart)) {
            $sl = $sessioncart[$id]['sl'] + 1;
        } else {
            $sl = 1;
        }
        $sessioncart[$id] = array(
            'id' => $id,
            'name' => $sanpham->pro_name,
            'image' => $sanpham->pro_image,
            'price' => $sanpham->pro_price,
            'discaount' => $sanpham->pro_discount,
            'sl' => $sl
        );
        $session->write('cart', $sessioncart);
        return $id;
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
        $hoadon = $this->Hoadon->newEntity();
        if ($this->request->is('post')) {
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
