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
  