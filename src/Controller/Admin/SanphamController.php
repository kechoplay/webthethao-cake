<?php
namespace App\Controller\Admin;

use App\Controller\Admin\App2Controller;


class SanphamController extends App2Controller
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Danhmuc']
        ];
        $sanpham = $this->paginate($this->Sanpham);

        $this->set(compact('sanpham'));
        $this->set('_serialize', ['sanpham']);
    }

    public function view($id = null)
    {
        $sanpham = $this->Sanpham->get($id, [
            'contain' => ['Pros', 'Danhmuc']
        ]);

        $this->set('sanpham', $sanpham);
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
        $pros = $this->Sanpham->Pros->find('list', ['limit' => 200]);
        $danhmuc = $this->Sanpham->Danhmuc->find('list', ['limit' => 200]);
        $this->set(compact('sanpham', 'pros', 'danhmuc'));
        $this->set('_serialize', ['sanpham']);
    }

    public function edit($id = null)
    {
        $sanpham = $this->Sanpham->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sanpham = $this->Sanpham->patchEntity($sanpham, $this->request->data);
            if ($this->Sanpham->save($sanpham)) {
                $this->Flash->success(__('The sanpham has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sanpham could not be saved. Please, try again.'));
        }
        $pros = $this->Sanpham->Pros->find('list', ['limit' => 200]);
        $danhmuc = $this->Sanpham->Danhmuc->find('list', ['limit' => 200]);
        $this->set(compact('sanpham', 'pros', 'danhmuc'));
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
