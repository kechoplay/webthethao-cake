<?php

namespace App\Controller\Admin;

use App\Controller\Admin\App2Controller;
use Cake\Http\Client;


class SanphamController extends App2Controller
{
    public function index()
    {
        $sanpham = $this->Sanpham->find('all');
//        debug($sanpham->count());
//        die();

        $this->set(compact('sanpham'));
        $this->set('_serialize', ['sanpham']);
    }

    public function add()
    {
        $sanpham = $this->Sanpham->newEntity();
        if ($this->request->is('post')) {

            $url = 'https://images-fe.ssl-images-amazon.com/images/I/51hpWKPGUcL.jpg';
            $content = file_get_contents($url);
            $imagename = substr($url,strrpos($url, '/')+1);
            echo $imagename;
            die;
            file_put_contents('img/image.jpg', $content);
            $this->Flash->error(__('ádasdad.'));


            // $file=$this->request->data['pro_image'];
            // $ext=substr(strtolower(strrchr($file['name'],'.')),1);
            // $arr_ext=array('jpg','png','jpeg','gif');
            // if (in_array($ext,$arr_ext)){
            //     if ($file['name']!=''){
            //         move_uploaded_file($file['tmp_name'],WWW_ROOT . 'img/' . $file['name']);
            //         $this->request->data['pro_image']=$file['name'];
            //     }
            // }
            // $sanpham = $this->Sanpham->patchEntity($sanpham, $this->request->data);
            // if ($this->Sanpham->save($sanpham)) {
            //     $this->Flash->success(__('The sanpham has been saved.'));

            //     return $this->redirect(['action' => 'index']);
            // }
            // $this->Flash->error(__('The sanpham could not be saved. Please, try again.'));
        }
        // $pros = $this->Sanpham->find('list', ['limit' => 200]);
        $danhmuc = $this->Sanpham->Danhmuc->find('list', ['limit' => 200])->where(['parent_id !=' => '0']);
        $this->set(compact('sanpham', 'danhmuc'));
        // $this->set('_serialize', ['sanpham']);
    }

    public function edit($id = null)
    {
        $sanpham = $this->Sanpham->get($id, [
            'contain' => ['Danhmuc']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $file = $this->request->data['pro_image'];
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
            $arr_axt=array('png','jpg','jpeg','gif');
//            echo "<pre>";
//            print_r($file);
//            echo $this->request->data['pro_image'];
//            echo $ext;
//            die();
            if ($file['name'] != '') {
                if (in_array($ext,$arr_axt)){
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/' . $file['name']);
                    $this->request->data['pro_image']=$file['name'];
                }
            }else{
                $this->request->data['pro_image']=$sanpham->pro_image;
            }
            $sanpham = $this->Sanpham->patchEntity($sanpham, $this->request->data);
            if ($this->Sanpham->save($sanpham)) {
                $this->Flash->success(__('The sanpham has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sanpham could not be saved. Please, try again.'));
        }
//        $pros = $this->Sanpham->find('list', ['limit' => 200])->count();
        $danhmuc = $this->Sanpham->Danhmuc->find('list', ['limit' => 200])->where(['parent_id !=' => '0']);
        $this->set(compact('sanpham', 'danhmuc'));
//        debug(compact('sanpham', 'pros', 'danhmuc'));
//        die();
        $this->set('_serialize', ['sanpham']);
    }

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
