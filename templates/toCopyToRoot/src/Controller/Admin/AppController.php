<?php
declare(strict_types=1);

// CSRF AJAX: https://discourse.cakephp.org/t/another-csrf-token-problem-probably/9351
// FILE UPLOAD: https://cakephp-upload.readthedocs.io/en/latest/examples.html

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
namespace App\Controller\Admin;

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

	public $session;
	public $config;
	public $prefix;
	public $plugin;
	public $controller;
	public $action;
	public $paging;
	public $version_id;		// Melyik verzióval dolgozunk
	public $version_name;	// Melyik verzióval dolgozunk
	public $headstation_id;	// Melyik fejállomással dolgozunk
	public $broadcasts 		= ['analog' => 'Analóg', 'digital' => 'Digitális'];
	public $roles 			= [];
	public $currentUser;

	/* PAL-D -> Analóg, DVB-C (64) -> Dig, DVB-C (256) -> Dig, QAM (64) -> Dig, QAM (256) -> DIG */
	public $band_types = ['pal_d' => 'PAL-D', 'dvb_c_64' => 'DVB-C (64)', 'dvb_c_256' => 'DVB-C (256)', 'qam_64' => 'QAM (64)', 'qam_256' => 'QAM (256)'];
	public $band_type_broadcast = ['pal_d' => 'analog', 'dvb_c_64' => 'digital', 'dvb_c_256' => 'digital', 'qam_64' => 'digital', 'qam_256' => 'digital'];


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

		//I18n::setLocale('en');

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

		$this->session 		= $this->getRequest()->getSession();
		$this->plugin 		= $this->request->getParam('plugin');		
		$this->controller 	= $this->request->getParam('controller');
		$this->action 		= $this->request->getParam('action');		

		$this->prefix 		= 'main';
		if($this->request->getParam('prefix') !== null){
			$this->prefix 		= strtolower($this->request->getParam('prefix'));	// A főoldali prefix alias neve a configban 'main'
		}
		
		$this->config = Configure::read('Theme.' . $this->prefix);

		//$this->query = $this->request->getQueryParams();
		//Configure::write('Theme.admin.link_navbar_search', false);
		//Configure::write('Theme.admin.link_fullscreen', false);		

		$this->paging = $this->session->read('Layout.' . $this->controller . '.Paging');

		$this->viewBuilder()->setTheme('JeffAdmin');
		
		$this->version_id 		= $this->session->read('version_id');
		$this->version_name 	= $this->session->read('version_name');
		$this->headstation_id 	= $this->session->read('headstation_id');

		
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');

		$this->set('session', $this->session);
		$this->currentUser = $this->session->read('Auth');
		$this->set('currentUser', $this->currentUser);
		$this->set('prefix', $this->prefix);
		$this->set('plugin', $this->plugin);
		$this->set('controller', $this->controller);
		$this->set('action', $this->action);

		$this->set('broadcasts', $this->broadcasts);
		$this->set('version_id', $this->version_id);
		$this->set('version_name', $this->version_name);
		$this->set('headstation_id', $this->headstation_id);
		
		$this->set('band_types', $this->band_types);

		$this->roles = ['superuser' => __('Super User'), 'admin' => __('Admin'), 'worker' => __('Co-Worker'), 'user' => __('User') ];
		$this->set('roles', $this->roles);
		
    }
	
}

