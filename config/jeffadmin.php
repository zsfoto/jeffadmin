<?php
	return [
		'Theme' => [
			'main' => [ // ------------------- Prefix ----------------------
				'name' => 'Notes',
				'prefix' => 'main',
				'title' => __('Notes'),

				'content_page_header' 	=> false,	// echo $this->element('contentPageHeader');	BE KELL MÁSOLNI ÉS SZERKESZTENI!

				//-------------- NAV BAR on top ----------------
				'link_navbar_links' 				=> false,	// NINCS KÉSZ
				'link_navbar_search' 				=> true,
				'link_navbar_dropdown_messages' 	=> false,
				'link_navbar_dropdown_notifications'=> false,
				'link_fullscreen' 					=> false,
				'link_show_right_sidebar' 			=> false,

				//-------------- index -------------------------
				'index_number_of_rows'	=> 100,		// Records number in paginate in controller
				
				'index_show_id' 		=> false,
				'index_show_visible' 	=> false,
				'index_show_pos' 		=> false,
				'index_show_created' 	=> false,
				'index_show_modified' 	=> false,
				'index_show_counts' 	=> false,
				'index_show_actions' 	=> true,
				'index_enable_add' 		=> false,
				'index_enable_view' 	=> true,
				'index_enable_edit' 	=> false,
				'index_enable_delete' 	=> false,
				'index_enable_db_click' => true,
				'index_db_click_action' => 'view',	// edit, view
				

				//-------------- edit -------------------------
				'edit_enable_delete' 	=> false,
				
				//-------------- view -------------------------
				'view_enable_delete' 	=> false,

				//-------------- form -------------------------
				'form_show_counts' 		=> false,
				
				
				'meta' => [
					'viewport' => 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no',
					'author' => 'Jeff Shoemaker',
					'description' => "Jeff's Admin",
				],
			
				// ---------------------------- Sidebar ---------------------
				'sidebar' => [
					'brandTexts' => "Notes Admin",
					'userName' => "Jeff Shoemaker",
					'showSearch' => false,
				],

				'sidebarMenu' => [

					[
						// --------------------- NavHeader ------------------
						'type' 	=> 'navheader',
						'title' => 'ADMIN',
					],

/*
					[
						'type' 	=> 'menuitem',
						'title' => __('Print PDF'),
						'controller' => 'Cities',
						'link' => '/cities/digitals/pdf',
						'target' => '_blank',
						'icon'	=> 'icon-file-pdf',
					],
*/

					[
						// ------------------ Menu Item ---------------------
						// Controller/Action vagy link!!!! A link az első amit figyelembe vesz!
						'type' 	=> 'menuitem',
						'title' => __('Admin'),
						'controller' => 'Admin',
						'action' => 'index',
						'icon'	=> 'icon-cog-alt',
						'link'	=> '/admin',
						'target' => '_top',
						//'badge'	=> [				// <<-------- Minta
						//	'type'	=> 'warning',
						//	'text'	=> '41',
						//],
					
					],

				],
			],

/*
####################################################################################################################################
####################################################################################################################################
####################################################################################################################################
#######  ########       ######   #######   ###  ###   ######  ###########  ########       ######   #######   ###  ###   ######  ####
#####  ##  ######  #####  ####    ##### #  ###  ###  #  ####  #########  ##  ######  #####  ####    ##### #  ###  ###  #  ####  ####
###  ######  ####  ######  ###  ##  #  ##  ###  ###  ##  ###  #######  ######  ####  ######  ###  ##  #  ##  ###  ###  ##  ###  ####
###          ####  ######  ###  #### ####  ###  ###  ###  ##  #######          ####  ######  ###  #### ####  ###  ###  ###  ##  ####
###  ######  ####  ######  ###  #########  ###  ###  ####  #  #######  ######  ####  ######  ###  #########  ###  ###  ####  #  ####
###  ######  ####  #####  ####  #########  ###  ###  #####    #######  ######  ####  #####  ####  #########  ###  ###  #####    ####
###  ######  ####      #######  #########  ###  ###  ######   #######  ######  ####      #######  #########  ###  ###  ######   ####
####################################################################################################################################
####################################################################################################################################
####################################################################################################################################
*/

			'admin' => [ // ------------------- Prefix ----------------------
				'name' => 'Admin',		
				'prefix' => 'admin',
				'title' => __('Admin'),

				'content_page_header' 	=> false,	// nem kell

				//-------------- NAV BAR on top ----------------
				'link_navbar_links' 				=> true,
				'link_navbar_search' 				=> true,
				'link_navbar_dropdown_messages' 	=> false,
				'link_navbar_dropdown_notifications'=> false,
				'link_fullscreen' 					=> true,
				'link_show_right_sidebar' 			=> false,

				//-------------- index -------------------------
				'index_number_of_rows'	=> 100,		// Records number in paginate in controller
				
				'index_show_id' 		=> false,
				'index_show_visible' 	=> false,
				'index_show_pos' 		=> false,
				'index_show_created' 	=> false,
				'index_show_modified' 	=> false,
				'index_show_counts' 	=> false,
				'index_show_actions' 	=> true,
				'index_enable_add' 		=> true,
				'index_enable_view' 	=> true,
				'index_enable_edit' 	=> true,
				'index_enable_delete' 	=> true,
				'index_enable_db_click' => true,
				'index_db_click_action' => 'edit',	// view
				

				//-------------- edit -------------------------
				'edit_enable_delete' 	=> true,
				
				//-------------- view -------------------------
				'view_enable_delete' 	=> true,

				//-------------- form -------------------------
				'form_show_counts' 		=> true,
				
				
				'meta' => [
					'viewport' => 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no',
					'author' => 'Jeff Shoemaker',
					'description' => "Jeff's Admin",
				],
			
				// ---------------------------- Sidebar ---------------------
				'sidebar' => [
					'brandTexts' => "Notes Admin",
					'userName' => "Jeff Shoemaker",
					'showSearch' => false,
				],

				//############################################################################################################
				//############################################################################################################
				//############################################################################################################
				//############################################################################################################
				//############################################################################################################
				'sidebarMenu' => [

					[
						// ------------------ Menu Item ---------------------
						// Controller/Action vagy link!!!! A link az első amit figyelembe vesz!
						'type' 	=> 'menuitem',
						'title' => __('Main page'),
						'icon'	=> 'icon-list',
						'link'	=> '/',
						'target' => '_top',
					],


					[
						// ------------------ NavHeader ---------------------
						'type' 	=> 'navheader',
						'title' => __('START'),
					],

					[
						// ------------------ Menu Item ---------------------
						'type' 	=> 'menuitem',
						'title' => __('Notes'),
						'controller' => 'Notes',			// Controller/Action vagy link!!!! A link az első amit figyelembe vesz!
						'action' => 'index',
						'icon'	=> 'nav-icon fas fa-th',
					],
					[
						// ------------------ Menu Item ---------------------
						'type' 	=> 'menuitem',
						'title' => __('Categories'),
						'controller' => 'Categories',			// Controller/Action vagy link!!!! A link az első amit figyelembe vesz!
						'action' => 'index',
						'icon'	=> 'nav-icon fas fa-th',
					],
					


					//############################################################################################################
					//############################################################################################################
					//############################################################################################################
					//############################################################################################################
					//############################################################################################################
					[
						// ------------------ NavHeader ---------------------
						//'onlySuperAdmin' => true,	// Majd a 2.0-ban talán ;-)
						'type' 	=> 'navheader',
						'title' => 'SZUPER ADMIN',
						'onlySuperUser' => true,	// Show only for is_superuser
					],

					[
						// ------------------ Menu Item ---------------------
						'type' 	=> 'menuitem',
						'title' => __('Users'),
						'controller' => 'MyUsers',			// Controller/Action vagy link!!!! A link az első amit figyelembe vesz!
						'action' => 'index',
						'icon'	=> 'nav-icon fas fa-th',
						'onlySuperUser' => true,	// Show only for is_superuser
					],

/*
					[
						// ------------------ Menu Item ---------------------
						'type' 	=> 'menuitem',
						'title' => __('Trackings'),
						'controller' => 'Trackings',			// Controller/Action vagy link!!!! A link az első amit figyelembe vesz!
						'action' => 'index',
						'icon'	=> 'nav-icon fas fa-th',
					],
*/

/*
					[
						// --------------------- SubMenu --------------------
						//'onlySuperUser' => true,	// Majd a 2.0-ban talán ;-)
						'type' => 'submenu',
						'title' => 'Tag admin',
						'icon'	=> 'nav-icon fas fa-users',
						//'badge'	=> [						// <<-- Mintának
						//	'type'	=> 'danger',
						//	'text'	=> '41',
						//],
						'items' => [	// Controller/Action vagy Link. Linket veszi figyelembe elsőnek.
							[
								'title' => 'Felhasználók',
								'controller' => 'MyUsers',
								'action' => 'index',
								//'link' => '/users/index',		// Controller/Action vagy link!!!! A link az első amit figyelembe vesz!
							],
							//[
							//	'title' => 'Csoportok',
							//	'controller' => 'Groups',
							//	'action' => 'index',
							//	//'link' => 'https://google.com',		// Controller/Action vagy link!!!! A link az első amit figyelembe vesz!
							//],

						]
					],
*/

/*
					[
						// --------------------- SubMenu --------------------
						//'onlySuperUser' => true,	// Majd a 2.0-ban talán ;-)
						'type' => 'submenu',
						'title' => 'Rendszeradatok',
						'icon'	=> 'nav-icon fas fa-users',
						//'badge'	=> [						// <<-- Mintának
						//	'type'	=> 'danger',
						//	'text'	=> '41',
						//],
						'items' => [	// Controller/Action vagy Link. Linket veszi figyelembe elsőnek.
							//[
							//	'title' => 'Languages',
							//	'controller' => 'Languages',
							//	'action' => 'index',
							//	//'link' => 'https://google.com',		// Controller/Action vagy link!!!! A link az első amit figyelembe vesz!
							//],
							[
								'title' => 'Logs',
								'controller' => 'Logs',
								'action' => 'index',
								//'link' => 'https://google.com',		// Controller/Action vagy link!!!! A link az első amit figyelembe vesz!
							],

						]
					
					],
*/

/*
					############################################################################
					############################################################################
					############################################################################

						// MINTÁNAK VAN ITT!!!!!!!!
					[
						// --------------------- SubMenu --------------------
						'type' => 'submenu',
						'title' => 'Minta',
						'icon'	=> 'nav-icon fas fa-tachometer-alt',
						//'badge'	=> [
						//	'type'	=> 'danger',
						//	'text'	=> '41',
						//],
						'items' => [	// Controller/Action vagy Link. Linket veszi figyelembe elsőnek.
							[
								'title' => 'Index',
								'controller' => 'Bands',
								'action' => 'index',
							],
							[
								'title' => 'Edit',
								'link' => 'http://google.com',
							],
							[
								'title' => 'Új csatorna',
								'controller' => 'Chanels',
								'action' => 'add',
								//'link' => 'https://google.com',
							],

						]
					
					],
					// MINTÁNAK VAN ITT!!!!!!!
					############################################################################
					############################################################################
					############################################################################
*/
				
				],		
			],
		],

	];
	
	
?>

