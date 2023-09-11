<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
		
		$this->session 		= $this->getRequest()->getSession();
		$this->prefix 		= $this->request->getParam('prefix');
		$this->plugin 		= $this->request->getParam('plugin');
		$this->controller 	= $this->request->getParam('controller');
		$this->action 		= $this->request->getParam('action');		

		$this->set('session', $this->session);
		$this->currentUser = $this->session->read('Auth');
		$this->set('currentUser', $this->currentUser);
		$this->set('prefix', $this->prefix);
		$this->set('plugin', $this->plugin);
		$this->set('controller', $this->controller);
		$this->set('action', $this->action);

		$this->prefix 		= 'main';	// strtolower($this->request->getParam('prefix'));	// A főoldali prefix alias neve a configban 'main'
		$this->set('prefix', $this->prefix);
		
		$this->roles = ['superuser' => __('Super User'), 'admin' => __('Admin'), 'worker' => __('Co-Worker'), 'user' => __('User') ];
		$this->set('roles', $this->roles);
		
		$this->config = Configure::read('Theme.' . $this->prefix);

		//$this->query = $this->request->getQueryParams();
		//Configure::write('Theme.admin.link_navbar_search', false);
		//Configure::write('Theme.admin.link_fullscreen', false);		
		
		$this->paging = $this->session->read('Layout.' . $this->controller . '.Paging');

		$this->viewBuilder()->setTheme('JeffAdmin');		

    }
	

	public function beforeRender(\Cake\Event\EventInterface $event)
    //public function beforeRender(EventInterface $event)
    {
		parent::beforeRender($event);
        if (
			(
				$this->request->getParam('action') === 'login' || 
				$this->request->getParam('action') === 'register' ||
				$this->request->getParam('action') === 'requestResetPassword' ||
				$this->request->getParam('action') === 'changePassword'
			)
			&&
            $this->request->getParam('controller') === 'Users' &&
            $this->request->getParam('plugin') === 'CakeDC/Users'
        ) {
            $this->viewBuilder()->setLayout('JeffAdmin.login');
        }
    }

	
	
}
