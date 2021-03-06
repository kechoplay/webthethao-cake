<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class SearchController extends AppController
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
        $danhmuc = TableRegistry::get('danhmuc')->find('list')->where(['parent_id != ' => '0'])->toArray();
        $maxprice = TableRegistry::get('sanpham')->find()->select('pro_price')->orderDesc('pro_price')->first();
        $minprice = TableRegistry::get('sanpham')->find()->select('pro_price')->orderAsc('pro_price')->first();
        $this->set('danhmuc', $danhmuc);
        $this->set('maxprice', $maxprice);
        $this->set('minprice', $minprice);
        $this->set('title', 'Tìm kiếm');
    }

    public function index()
    {
        if ($this->request->is(['get'])) {
            if ($this->request->getQuery('search') == 'Search') {
                $condition = [];
                if (($categoory=$this->request->getQuery('category')) != 0) {
                    $condition['cat_id'] = $categoory;
                }
                if (($name=$this->request->getQuery('name')) != '') {
                    $condition['pro_name LIKE'] = '%' . $name . '%';
                }
//                echo $this->request->getQuery('name');
//                die();
                if ($price=$this->request->getQuery('price')) {
                    $price = explode(',', $price);
                    $minprice = $price[0];
                    $maxprice = $price[1];
                    $condition['pro_price >='] = $minprice;
                    $condition['pro_price <='] = $maxprice;
                }
                $orders=[];
                if ($order = $this->request->getQuery('order')) {
                    if ($order == 'nameasc') {
                        $orders['pro_name'] = 'asc';
                    }
                    if ($order == 'namedesc') {
                        $orders['pro_name'] = 'desc';
                    }
                    if ($order == 'priceasc') {
                        $orders['pro_price'] = 'asc';
                    }
                    if ($order == 'pricedesc') {
                        $orders['pro_price'] = 'desc';
                    }
                }
                $sanpham = TableRegistry::get('sanpham')->find('all')->where($condition)->order($orders);
                $sanphamwithcount = TableRegistry::get('sanpham')->find('all')->where($condition)->order($orders)->count();
//                debug($sanpham);
//                die();
                $this->set('query',$order);
                $this->set('price',$price);
                $this->set('name',$name);
                $this->set('categoory',$categoory);
                $this->set('sanphamwithcount',$sanphamwithcount);
                $this->set('sanpham', $this->paginate($sanpham));
            }
        }
    }

}
