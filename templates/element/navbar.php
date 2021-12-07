<?php 
	use Cake\Core\Configure;
	$prefix = strtolower( $this->request->getParam('prefix') );
	$config = Configure::read('Theme.'.$prefix);
	//$config['link_navbar_links'] 					= true;
	//$config['link_navbar_search']					= true;
	//$config['link_navbar_dropdown_messages']		= false;
	//$config['link_navbar_dropdown_notifications']	= false;
	//$config['link_fullscreen']					= true;
	//$config['link_show_right_sidebar']			= false;
?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand text-sm navbar-dark navbar-lightblue">
  
	<?= $this->element('JeffAdmin.navbarLinks') ?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
	
	  <?php if(isset($config['link_navbar_search']) && $config['link_navbar_search']){ ?>
		<?= $this->element('JeffAdmin.navbarSearch'); ?>
	  <?php } ?>

	  <?php if(isset($config['link_navbar_dropdown_messages']) && $config['link_navbar_dropdown_messages']){ ?>
		<?php //include_once("navbar_dropdown_messages.php"); CELL kell ide ?>
	  <?php } ?>
	  
	  <?php if(isset($config['link_navbar_dropdown_notifications']) && $config['link_navbar_dropdown_notifications']){ ?>
		<?php //include_once("navbar_dropdown_notifications.php"); CELL kell ide  ?>
	  <?php } ?>
	  
	  <?php if(isset($config['link_fullscreen']) && $config['link_fullscreen']){ ?>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
	  <?php } ?>

<?php /*
	  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

	  <li class="dropdown user user-menu">
			<!-- Menu Toggle Button -->
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				<!-- The user image in the navbar-->
				<img src="/ticketing/images/uploads/users/7.png" alt="Varga Zsolt" class="user-image">
				<!-- hidden-xs hides the username on small devices so only the image appears. -->
				<span class="hidden-xs"><?php  
					//echo $this->Html->tag(
					//	'span',
					//	__d('cake_d_c/users', '{0} {1}', $user->last_name, $user->first_name),
					//	['class' => 'full_name']
					//) ?></span>
			</a>
			<ul class="dropdown-menu">
				<!-- The user image in the menu -->
				<li class="user-header">
					<!--img src="/ticketing/images/uploads/users/7.png" alt="Varga Zsolt" class="img-circle"-->
					<?= $this->Html->image('JeffAdmin./dist/img/avatar5.png', ['class'=>'img-circle elevation-2', 'alt'=>'User Image']) ?>
					<p><?php  
					//echo $this->Html->tag(
					//	'span',
					//	__d('cake_d_c/users', '{0} {1}', $user->last_name, $user->first_name),
					//	['class' => 'full_name']
					//) ?><?= __d('cake_d_c/users', 'Role') ?>:&nbsp;<b><?= $roles[$user->role] ?></b></small></p>

					<p class="text-muted text-center"><?= __d('cake_d_c/users', 'Email') ?>:&nbsp;<b><a href="mailto:<?= $user->email ?>"><?= $user->email ?></a></b></p>
					
				</li>

				<!-- Menu Body -->
				<!--li class="user-body">
					<div class="row">
						<div class="col-xs-4 text-center">
							<a href="#">Követők</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="#">Sales</a>
						</div>
						<div class="col-xs-4 text-center">
							<a href="#">Barátok</a>
						</div>
					</div>
				</li--><!-- /.row -->

				<!-- Menu Footer-->
				<li class="user-footer">
					<div class="pull-left">
						<!--a href="/ticketing/admin/profil" class="btn btn-default btn-flat">Profil</a-->
						
						<?php 
							if(isset($this->User)){
								//echo $this->Html->link(__d('cake_d_c/users','Profil'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'profile'], ['class' => 'btn btn-default btn-flat']);
								//echo $this->User->welcome();
								//echo __d('cake_d_c/users','Profil');
							}else{
								//echo "---";
							}
						?>
					</div>
					<div class="pull-left" style="margin-left: 5px;">
						<!--a href="/ticketing/admin/changepassword" class="btn btn-default btn-flat">Jelszó csere</a-->
						<?php //= $this->Html->link('<b>' . __d('cake_d_c/users', 'Change Password') . '</b>', ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'changePassword'], ['escape' => false, 'class' => 'btn btn-default btn-flat']); ?>
					</div>
					<div class="pull-right">
						<?php 
							if(isset($this->User)){
								echo $this->User->logout(__d('cake_d_c/users','Logout') . ' <i class="icon-logout"></i>', ['class' => 'btn btn-default btn-flat', 'escape' => false]);
							}else{
								echo "x";
							}
						 ?>
					</div>
				</li>
			</ul>
		</li>
*/ ?>
	  
	  <?php if(isset($config['link_show_right_sidebar']) && $config['link_show_right_sidebar']){ ?>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
	  <?php } ?>
	  
    </ul>
  </nav>
  <!-- /.navbar -->
  