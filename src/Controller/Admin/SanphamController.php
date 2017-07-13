<?php

namespace App\Controller\Admin;

use App\Controller\Admin\App2Controller;


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
            $sanpham = $this->Sanpham->patchEntity($sanpham, $this->request->data);
            if ($this->Sanpham->save($sanpham)) {
                $this->Flash->success(__('The sanpham has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sanpham could not be saved. Please, try again.'));
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
