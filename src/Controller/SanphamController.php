<?php

namespace App\Controller;

use App\Controller\AppController;


class SanphamController extends AppController
{
    public $paginate = [
        'limit' => ITEMS_BLOCKS_PER_PAGE,
//        'order' => [
//            'pro_name' => 'asc'
//        ]
    ];

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->set('title', 'Sản phẩm');
    }

    public function index()
    {
        $condition = [];
        $order='';
        if ($order = $this->request->getQuery('order')) {
            if ($order == 'nameasc') {
                $condition['pro_name'] = 'asc';
            }
            if ($order == 'namedesc') {
                $condition['pro_name'] = 'desc';
            }
            if ($order == 'priceasc') {
                $condition['pro_price'] = 'asc';
            }
            if ($order == 'pricedesc') {
                $condition['pro_price'] = 'desc';
            }
        }
        $sanpham = $this->paginate($this->Sanpham
            ->find('all')
            ->order($condition));
        $countsanpham = count($this->Sanpham->find('all')->toArray());
        $this->set('countsanpham', $countsanpham);
        $this->set('query', $order);
        $this->set(compact('sanpham'));
    }

    public function detail($id = null)
    {
        $sanpham = $this->Sanpham->get($id, [
            'contain' => ['Danhmuc']
        ]);

        $sanphamlienquan = $this->Sanpham
            ->find('all')
            ->where(['cat_id' => $sanpham['cat_id'], 'pro_id !=' => $id]);

        $sanpham->pro_view++;
        $this->Sanpham->save($sanpham);

        $this->set('sanpham', $sanpham);
        $this->set('sanphamlienquan', $sanphamlienquan);
        $this->set('title', $sanpham['pro_name']);
    }

    public function discount()
    {
        $sanpham = $this->Sanpham
            ->find('all')
            ->where(['pro_discount !=' => 0]);
        $countsanphamgiamgia = $sanpham->count();
        $this->set('sanpham', $this->paginate($sanpham));
        $this->set('countsanphamgiamgia', $countsanphamgiamgia);
        $this->set('title', 'Sản phẩm giảm giá');
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
