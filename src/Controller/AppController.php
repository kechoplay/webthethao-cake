<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Collection\Collection;
use Cake\Controller\Controller;
use Cake\Event\Event;
use App\View\AppView;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();
        $session=$this->request->session();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $where = 'pro_status=1';
        $randomproduct = TableRegistry::get('sanpham')->getlistProduct($where, 'RAND()', 2);
        $treecategory = TableRegistry::get('danhmuc')->find('all');
        $slideimage = TableRegistry::get('slide')->find('all')->where(['sli_status' => '1'])->toArray();
        $collection = new Collection($treecategory);
        if($session->check('cart')){
            $cart=$session->read('cart');

            $this->set('cart',$cart);
        }

        $this->set('randomproduct', $randomproduct);
        $this->set('slideimage', $slideimage);
        $this->set(compact('collection'));

        $this->viewBuilder()->setLayout('default2');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
