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

namespace App\Controller\Admin;

use Cake\Collection\Collection;
use Cake\Controller\Controller;
use Cake\Event\Event;
use App\View\AppView;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class App2Controller extends Controller
{

    public function initialize()
    {
        parent::initialize();
        date_default_timezone_set('asia/ho_chi_minh');
        if (isset($this->request->params['prefix']) || $this->request->params['prefix'] == 'admin') {
            $this->viewBuilder()->setLayout('default');
        }
        $where = 'pro_status=1';
        $randomproduct = TableRegistry::get('sanpham')->getlistProduct($where, 'RAND()', 2);
        $treecategory = TableRegistry::get('danhmuc')->find('all');
        $collection = new Collection($treecategory);

        $this->set('randomproduct', $randomproduct);
        $this->set(compact('collection'));

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');

//        $this->loadComponent('Auth', [
//            'authenticate' => [
//                'form' => [
//                    'fields' => ['username' => 'user', 'password' => 'pass'],
//                    'userModel' => 'Admin'
//                ]
//            ],
//            'loginAction' => ['controller' => 'admin', 'action' => 'login'],
//            'loginRedirect' => ['controller' => 'sanpham', 'action' => 'index'],
//            'logoutRedirect' => ['controller' => '../home', 'action' => 'index']
//        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    public function beforeFilter(Event $event)
    {
//        $this->Auth->allow('login');
//        $this->set('login_user', $this->Auth->user());
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
