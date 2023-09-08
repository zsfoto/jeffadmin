<?php 
use Cake\Core\Configure;
$prefix = strtolower( $this->request->getParam('prefix', '') );
if($prefix == null){	// ha a főoldal lenne, ami prefix nélkül van!
	$prefix = 'main';
}
$controller = $this->request->getParam('controller');
$action = $this->request->getParam('action');

$sidebar 	 = Configure::read('Theme.'.$prefix.'.sidebar');
//debug($sidebar); die();

$sidebarMenu = Configure::read('Theme.'.$prefix.'.sidebarMenu');
$onlySuperAdmin = false;	// A login után kiderül, hogy az illető superadmin-e.

$cakeDC = false;
if($controller == 'Users'){
	$cakeDC = true;
}

//debug($sidebarMenu); die();

?>
	<!-- Main Sidebar Container --><?php //  style="margin-top: 0px;" ?>
	<aside class="main-sidebar sidebar-dark-lightblue elevation-4">
		<!-- Brand Logo -->
		<a href="<?= $this->Url->build(['controller' => 'Cities', 'action' => 'index', 'plugin' => null]) ?>" class="brand-link navbar-lightblue text-sm">
			<?= $this->Html->image('JeffAdmin./dist/img/AdminLTELogo.png', ['class'=>'brand-image img-circle elevation-3', 'style'=>'opacity: .5', 'alt'=>'JeffAdmin Logo']) ?>
			<span class="brand-text font-weight-bold"><?= $sidebar['brandTexts'] ?></span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
				
					<?= $this->Html->image('JeffAdmin./dist/img/avatar5.png', ['class'=>'img-circle elevation-2', 'alt'=>'User Image']) ?>
					
					<?php
						//$this->User->__d('jeff_admin', 
						//	$this->Html->image('JeffAdmin./dist/img/avatar5.png', ['class' => 'img-circle elevation-2', 'alt'=>'User Image', 'escape' => false]),
						//)
					?>
				</div>
				<div class="info">
					<?php 
						if(isset($this->User)){
							echo $this->User->welcome('<li class="nav-item" title="' . __('Logout') . '"><i class="fa fa-minus bigfonts nav-icon"></i></li>', ['class' => 'd-block font-weight-bold', 'escape' => false]);
						}else{
							echo "---";
						}
					?>
					<!--a href="#" class="d-block font-weight-bold"><?= $sidebar['userName'] ?></a-->
				</div>
				<div class="logout">
					<?php 
						if(isset($this->User)){
							echo $this->User->logout('<i class="icon-logout"></i>', ['class' => 'd-block font-weight-bold', 'escape' => false]);
						}else{
							echo "x";
						}
					 ?>
				</div>
			</div>

<?php if(isset($sidebar['showSearch']) && $sidebar['showSearch']){ ?>
			<!-- SidebarSearch Form -->
			<div class="form-inline">
				<div class="input-group" data-widget="sidebar-search">
					<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-sidebar">
							<i class="fas fa-search fa-fw"></i>
						</button>
					</div>
				</div>
			</div>
<?php } ?>
				

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

<?php //############################################## CakeDC ############################################## ?>
<?php if($cakeDC){ ?>
		<li class="nav-header"><?= __('Channels') ?></li>
<?php
	$active = '';
	if(false && $action == 'profile'){ $active = ' active'; }
	//if($action == 'profile'){ $active = ' active'; }
	
?>
<?php 	if(isset($this->User)){ ?>
		<li class="nav-item">
			<a href="<?= $this->Url->build(['controller' => 'Cities', 'action' => 'index', 'plugin' => null]) ?>" class="nav-link<?= $active ?>"><i class="nav-icon fas fa-arrow-left"></i><p><?= __('Back to main page') ?></p></a>
<?php /*
			<!--a href="<?= $this->Url->build(['controller' => 'Cities', 'action' => 'index', 'plugin' => null]) ?>" class="nav-link<?= $active ?>"><i class="nav-icon fas fa-user"></i><p><?= __('Back to main page') ?></p></a-->
			<?php //= $this->User->__d('jeff_admin', 'Profil', ['class' => 'nav-link' . $active]) ?>
			<!--a href="/profile" class="nav-link<?= $active ?>"><i class="nav-icon fas fa-user"></i><p><?= __('Profil') ?></p></a-->
*/ ?>
		</li>
<?php 	} ?>		
<?php } ?>
<?php //############################################## /.CakeDC ############################################## ?>

<?php foreach($sidebarMenu as $m){ ?>

<?php //############## MenuItem ####################  ?>
<?php if($m['type'] == 'navheader' && (!isset($m['onlySuperAdmin']))){ ?>
<?php 	if( !isset($m['onlySuperUser']) ||  (isset($m['onlySuperUser']) && $m['onlySuperUser'] && $currentUser->is_superuser == true)){ ?>
					<li class="nav-header"><?= $m['title'] ?></li>	
<?php 	}  //menuitem  ?>
<?php }  //menuitem  ?>

<?php /* if($m['type'] == 'navheader' && isset($m['onlySuperAdmin']) && $m['onlySuperAdmin'] == $onlySuperAdmin && !$cakeDC){ ?>
					<li class="nav-header"><?= $m['title'] ?></li>	
<?php } */ //menuitem  ?>
<?php //############## /.MenuItem ##################  ?>
<?php //############## MenuItem ####################  ?>
<?php if($m['type'] == 'menuitem' && !$cakeDC ){ ?>
<?php 	if( !isset($m['onlySuperUser']) ||  (isset($m['onlySuperUser']) && $m['onlySuperUser'] && $currentUser->is_superuser == true)){ ?>
					<li class="nav-item">		  
						<?php 
							$active = '';
							//if(isset($controller) && isset($action) && isset($m['controller']) && isset($m['action']) && $m['controller'] == $controller && $m['action'] == $action ){
							if(isset($controller) && isset($m['controller']) && $m['controller'] == $controller ){
								$active = ' active';
							}
						
							if(isset($m['link']) && $m['link'] != ''){
								$target = '_blank';
								if(isset($m['target'])){
									$target = $m['target'];
								}
								echo $this->Html->link( '<i class="' . $m['icon'] . '"></i><p>' . $m['title'] . '</p>', $m['link'], ['escape' => false, 'class' => 'nav-link', 'target' => $target] );
							}else{
								echo $this->Html->link( '<i class="' . $m['icon'] . '"></i><p>' . $m['title'] . '</p>', [ 'controller' => $m['controller'],  'action' => $m['action'] ], ['escape' => false, 'class' => 'nav-link' . $active] );
							}
						?>
						<?php /*							
								<a href="<?= $m['link'] ?>" class="nav-link<?php if( isset($m['active']) && $m['active'] ){ echo ' active'; } ?>">
									<i class="<?= $m['icon'] ?>"></i>
									<p>
										<?= $m['title'] ?>
										<?php if(isset($m['badge'])){ ?>
										<span class="right badge badge-<?= $m['badge']['type'] ?>"><?= $m['badge']['text'] ?></span>
										<?php } ?>
									</p>
								</a>
						*/ ?>

					</li>
<?php 	} //role  ?>
<?php } //menuitem  ?>
<?php //############## /.MenuItem ##################  ?>

<?php //############## SubMenu #####################  ?>
<?php if($m['type'] == 'submenu' && !$cakeDC){ // && (!isset($m['onlySuperAdmin']) || isset($m['onlySuperAdmin']) && $m['onlySuperAdmin'] == !$onlySuperAdmin)){ ?>
<?php 	if( !isset($m['onlySuperUser']) ||  (isset($m['onlySuperUser']) && $m['onlySuperUser'] && $currentUser->is_superuser == true)){ ?>
<?php
							$menuOpen = false;
							foreach($m['items'] as $item){
								if(isset($controller) && isset($action) && isset($item['controller']) && $controller == $item['controller'] && $action == $item['action'] ){
									$menuOpen = true;
									break;
								}			
							}
?>
					<li class="nav-item<?php if($menuOpen){ echo ' menu-open'; } ?>">
						<a href="#" class="nav-link<?php if( $menuOpen ){ echo ' active'; } ?>">
<?php if(isset($m['icon'])){ ?>
							<i class="<?= $m['icon'] ?>"></i>
<?php } ?>
							<p>
								<?= $m['title'] ?>
								<i class="right fas fa-angle-left"></i>
<?php if(isset($m['badge'])){ ?>
								<span class="right badge badge-<?= $m['badge']['type'] ?>"><?= $m['badge']['text'] ?></span>
<?php } ?>
							</p>
						</a>
<?php if(isset($m['items'])){ ?>
						<ul class="nav nav-treeview">
<?php foreach($m['items'] as $item){ ?>
<?php
		$itemActive = '';
		if(isset($controller) && isset($action) && isset($item['controller']) && isset($item['action']) && $item['controller'] == $controller && $item['action'] == $action ){
			$itemActive = ' active';
		}
?>
							<li class="nav-item">
								<?php 
									if(isset($item['link']) && $item['link'] != ''){
										$target = '_blank';
										if(isset($item['target'])){
											$target = $item['target'];
										}
										echo $this->Html->link( '<i class="fa fa-minus bigfonts nav-icon"></i><p>' . $item['title'] . '</p>', $item['link'], ['escape' => false, 'class' => 'nav-link', 'target' => $target] );
									}else{
										echo $this->Html->link( '<i class="fa fa-minus bigfonts nav-icon"></i><p>' . $item['title'] . '</p>', ['controller' => $item['controller'], 'action' => $item['action'] ], ['escape' => false, 'class' => 'nav-link' . $itemActive] );
									}
								?>

							</li>
<?php } ?>
						</ul>
<?php } // items[] ?>
							
					</li>
<?php 	} // role ?>
<?php } // submenu[] ?>
<?php //############## /.SubMenu ###################  ?>



<?php 
	//echo $this->AuthLink->link(__d('cake_d_c/users', 'List Users'), ['action' => 'index'])
	//echo $this->AuthLink->postLink(__d('cake_d_c/users', 'Delete'), ['action' => 'delete', $user->id], ['confirm' => __d('cake_d_c/users', 'Are you sure you want to delete # {0}?', $user->id)])
	//echo $this->AuthLink->link(__d('cake_d_c/users', 'List Users'), ['action' => 'index', 'before' => '<i class="fas fa-list"></i>']);

?>


<?php /* //############## SubMenu #####################  ?>
						<?php if($m['type'] == 'submenu' && isset($m['onlySuperAdmin']) && $m['onlySuperAdmin'] == $onlySuperAdmin){ ?>
						<?php
							$menuOpen = false;
							foreach($m['items'] as $item){
								if(isset($controller) && isset($action) && $controller == $item['controller'] && $action == $item['action'] ){
									$menuOpen = true;
									break;
								}			
							}
						?>
								
						<li class="nav-item<?php if($menuOpen){ echo ' menu-open'; } ?>">
							<a href="#" class="nav-link<?php if( $menuOpen ){ echo ' active'; } ?>">
								<?php if(isset($m['icon'])){ ?>
								<i class="<?= $m['icon'] ?>"></i>
								<?php } ?>
								<p>
								<?= $m['title'] ?>
									<i class="right fas fa-angle-left"></i>
								<?php if(isset($m['badge'])){ ?>
									<span class="right badge badge-<?= $m['badge']['type'] ?>"><?= $m['badge']['text'] ?></span>
								<?php } ?>
								</p>
							</a>
							<?php if(isset($m['items'])){ ?>
							<ul class="nav nav-treeview">
							<?php foreach($m['items'] as $item){ ?>
								<?php
									$itemActive = '';
									if(isset($controller) && isset($action) && isset($item['controller']) && isset($item['action']) && $item['controller'] == $controller && $item['action'] == $action ){
										$itemActive = ' active';
									}
								?>
								<li class="nav-item">
									<?php 
										if(isset($item['link']) && $item['link'] != ''){
											echo $this->Html->link( '<i class="fa fa-minus bigfonts nav-icon"></i><p>' . $item['title'] . '</p>', $item['link'], ['escape' => false, 'class' => 'nav-link', 'target' => '_blank'] );
										}else{
											echo $this->Html->link( '<i class="fa fa-minus bigfonts nav-icon"></i><p>' . $item['title'] . '</p>', ['controller' => $item['controller'], 'action' => $item['action'] ], ['escape' => false, 'class' => 'nav-link' . $itemActive] );
										}
									?>
								</li>
								<?php } ?>
							</ul>
							<?php } // items[] ?>
							
						</li>
						<?php } // submenu[] ?>
						<?php */ //############## /.SubMenu ###################  ?>
<?php } //foreach  ?>

				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
	<!-- /.sidebar -->
	</aside>
	