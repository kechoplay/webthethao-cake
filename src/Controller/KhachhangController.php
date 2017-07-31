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
        $khachhang=$this->Khachhang;
        $user=$this->Khachhang->newEntity();
        if($this->request->is('post')){
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
            if (!preg_match("/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/", $userdata['password'])) {
                $return =array(
                    'success' => false,
                    'message' => "Mật khẩu không đúng định dạng"
                    );
            }
            foreach ($userdata as $key => $value){
                if ($key=="repassword"){
                    unset($userdata[$key]);
                }
            }
            $user=$khachhang->patchEntity($user,$userdata);
            if ($khachhang->save($user)){
                $return = array(
                    'success' => true,
                    'message' => "Bạn đã đăng ký thành công"
                    );
            }
            echo json_encode($return);
            die();
        }else{
            $this->set('title','Đăng ký');
        }
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
    public function login()
    {
        if ($this->request->is('post')){
            $user=$this->Auth->identify();
            if ($user){
                if ($user['status']==1) {
                    $this->Auth->setUser($user);
                    $return = array(
                        'success' => true
                    );
                }else{
                    $return = array(
                        'success' => false,
                        'message' => 'Tài khoản chưa kích hoạt'
                    );
                }
            }else{
                $return = array(
                    'success' => false,
                    'message' => 'Tên đăng nhập hoặc mật khẩu chưa đúng'
                );
            }
            echo json_encode($this->Auth->identify());
//            die();
        }else{
            return $this->redirect($this->referer());
        }
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
