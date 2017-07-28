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
        $khachhang = $this->paginate($this->Khachhang);

        $this->set(compact('khachhang'));
        $this->set('_serialize', ['khachhang']);
    }

    public function register()
    {
        if($this->request->is('post')){
            $khachhang=$this->Khachhang;
            $user=$this->Khachhang->newEntity();
            $userdata=$this->request->getData();
            $username=$khachhang->find('all')->where(['username'=>$userdata['username']])->count();
            $email=$khachhang->find('all')->where(['email'=>$userdata['email']])->count();
            if ($username>0){
                $return =array(
                    'success' => false,
                    'message' => "Tên đăng nhập đã tồn tại"
                );
            }
            if ($email>0){
                $return =array(
                    'success' => false,
                    'message' => "email đã tồn tại"
                );
            }
            foreach ($user as $key => $value){
                if ($key=="repassword"){
                    unset($user[$key]);
                }
            }
            $user=$this->Khachhang->patchEntity($user,$userdata);
            if ($khachhang->save($user)){
                $return = array(
                    'success' => true,
                    'message' => "Bạn đã đăng ký thành công"
                );
            }
            echo json_encode($return);
        }
        $this->set('title','Đăng ký');
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
        $khachhang = $this->Khachhang->get($id);

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
        $cuses = $this->Khachhang->find('list', ['limit' => 200]);
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
        $cuses = $this->Khachhang->find('list', ['limit' => 200]);
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
