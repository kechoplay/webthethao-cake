<?php
/**
 * Created by PhpStorm.
 * User: TungVoDoi
 * Date: 7/24/2017
 * Time: 9:22 PM
 */

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Hoadon Controller
 *
 * @property \App\Model\Table\HoadonTable $Hoadon
 */
class CartController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->_tblproduct=TableRegistry::get('sanpham');
        $this->_tblhoadon=TableRegistry::get('hoadon');
        $this->_tblhoadonchitiet=TableRegistry::get('hoadonchitiet');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sessioncart=$this->request->session();
        $mycart=$sessioncart->read('cart');
        $this->set('mycart',$mycart);
        $this->set('title','Giỏ hàng');
    }

    public function addcart($id=null)
    {
        $sanpham = TableRegistry::get('sanpham')->get($id);
        $session = $this->request->session();
        $sessioncart = $session->read('cart') ? $session->read('cart') : [];
        if (array_key_exists($id, $sessioncart)) {
            $sl = $sessioncart[$id]['sl'] + 1;
        } else {
            $sl = 1;
        }
        $sessioncart[$id] = array(
            'id' => $id,
            'name' => $sanpham->pro_name,
            'image' => $sanpham->pro_image,
            'price' => $sanpham->pro_price,
            'discount' => $sanpham->pro_discount,
            'quantity' => $sanpham->pro_quantity,
            'sl' => $sl
            );
        $session->write('cart', $sessioncart);
        $session->read('cart');
        echo count($sessioncart);
        die();
    }

    public function addcartwithquan()
    {
        $session=$this->request->session();
        if($this->request->is('post')){
            $id=$this->request->getData('proid');
            $number=$this->request->getData('number');
            $sanpham = TableRegistry::get('sanpham')->get($id);
            $sessioncart=$session->read('cart') ? $session->read('cart') : [];
            if (array_key_exists($id,$sessioncart)){
                $sl=$sessioncart[$id]['sl']+$number;
            }else{
                $sl=$number;
            }
            $sessioncart[$id]=array(
                'id' => $id,
                'name' => $sanpham->pro_name,
                'image' => $sanpham->pro_image,
                'price' => $sanpham->pro_price,
                'discount' => $sanpham->pro_discount,
                'quantity' => $sanpham->pro_quantity,
                'sl' => $sl
                );
            $session->write('cart',$sessioncart);
            echo count($sessioncart);
            die();
        }
    }

    public function delcart($id = null)
    {
        $session=$this->request->session();
        $sessioncart=$session->read('cart');
        if (count($sessioncart)!=1 && count($sessioncart)>0 ) {
            unset($sessioncart[$id]);
            $session->write('cart',$sessioncart);
        }else{
            $session->delete('cart');
        }
        $this->redirect(['action'=>'index']);
    }


    public function update()
    {
        $session=$this->request->session();
        $sessioncart=$session->read('cart');
        if ($this->request->is('post')){
            $number=$this->request->data('num');
            $quan=$this->request->data('quan');
            foreach ($number as $key => $value){
                if (intval($value)>intval($quan)){
                    $return =array(
                        'success' => false,
                        'message' => 'Số lượng bạn nhập nhiều hơn số lượng có trong shop'
                        );
                }elseif ($value==0 || $value=='') {
                    unset($sessioncart[$key]);
                    $return =array(
                        'success' => true
                        );
                }elseif($value > 0){
                    $sessioncart[$key]['sl']=$value;
                    $return =array(
                        'success' => true
                        );
                }
            }
            $session->write('cart',$sessioncart);
            echo json_encode($return);
            die();
        }
    }

    public function checkout()
    {
        $hoadon=$this->_tblhoadon->newEntity();
        $session=$this->request->session();
        if ($this->request->is('post')){
            $sessioncart=$session->read('cart');
            foreach ($sessioncart as $key => $value) {
                $id=$key;
                $price=$value['price'];
                $discount=$value['discount'];
                $quantity=$value['quantity'];
                $sl=$value['sl'];
                $total=($price*$sl)-($discount*$sl);
                $cusid=$this->Auth->user('cus_id');
                $hoadon=$this->_tblhoadon->patchEntity($hoadon,$this->request->getData());
                $hoadon->cus_id=$cusid;
                $hoadon->total=$total;
                if($this->_tblhoadon->save($hoadon)){
                    $return = array(
                        'success'=>'true',
                        'message'=>'Bạn đã mua hàng thành công'
                        );
                }
            }
            echo json_encode($return);
            die();
        }else{
            $this->set('title','Thanh toán');
        }
    }
}
