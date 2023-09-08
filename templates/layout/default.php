<?php use Cake\Core\Configure; ?>
<?php 
	$prefix = strtolower( $this->request->getParam('prefix', '') );
	if(!isset($prefix) || $prefix == ''){
		$prefix = 'main';
	}
	//debug( $this->request->getParam('controller') ); 
?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<?= $this->Html->charset() ?>
	
	<?= $this->Html->meta('viewport', Configure::read('Theme.' . $prefix . '.meta.viewport') ) ?>
	
	<?php /* title><?php echo Configure::read('Theme.' . $prefix . '.title'); ?> | <?php echo $this->fetch('title'); ?></title */ ?>
	<title><?php echo Configure::read('Theme.' . $prefix . '.title'); ?> | <?= (isset($title)) ? $title : ''; ?></title>
	<?= $this->Html->meta('description', Configure::read('Theme.' . $prefix . '.meta.description') ) ?>
	
	<?= $this->Html->meta('author', Configure::read('Theme.' . $prefix . '.meta.author') ) ?>
<?php /*
	<meta name="csrf-token" content="<?= substr(substr(json_encode($this->request->getAttribute('csrfToken')), 1), 0, -1)  ; ?>">
*/ ?>

	<?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')) ?>
	
	<?= $this->fetch('meta') ?>
<?= $this->Html->meta('favicon.ico', 'JeffAdmin./favicons/favicon.ico', ['type' => 'icon']) ?>
	<?= $this->Html->css([
		'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
		'JeffAdmin./plugins/fontello/css/fontello',
		'JeffAdmin./plugins/fontawesome-free/css/all.min',
		'JeffAdmin./plugins/font-awesome/css/font-awesome.min',
		//'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min',
		'JeffAdmin./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min',
		'JeffAdmin./plugins/overlayScrollbars/css/OverlayScrollbars.min',
		'JeffAdmin./plugins/sweetalert2/sweetalert2.min',
		'JeffAdmin./plugins/CodeSeven-toastr-50092cc/build/toastr.min',
	]); ?>

	<?= $this->Html->css('JeffAdmin./dist/css/adminlte.min'); ?>
	
	<?= $this->Html->css('/css/admin_style'); // Egyedi, a plugintól eltérő stílusok az adminhoz ?>
	
	<?= $this->fetch('css') ?>

	<?php /*
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="/dist/css/styles.css" />
	*/ ?>
<?= $this->Html->css('JeffAdmin./dist/css/jeffadmin') ?>

</head>
<?php //<!--body class="hold-transition sidebar-mini layout-fixed"--> ?>
<?php //<body class="control-sidebar-slide-open layout-navbar-fixed sidebar-mini layout-fixed"> ?>
<?php //<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed"> // Együtt hibás: layout-fixed layout-navbar-fixed?>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
	<div class="wrapper">

		<?php //= $this->element('JeffAdmin.preloader') ?>

		<?= $this->element('JeffAdmin.navbar') ?>

		<?= $this->element('JeffAdmin.leftSidebar') ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			
			<?php
				if(empty($prefix)){
					$prefix = 'main';
				}
				if( Configure::read('Theme.'.$prefix.'.content_page_header') !== null && Configure::read('Theme.'.$prefix.'.content_page_header')){
					//echo $this->element('JeffAdmin.contentPageHeader');
					echo $this->element('contentPageHeader');
				}else{
					echo "<br>";
				}
			?>

			
			<section class="content"><!-- Main content -->
				<div class="container-fluid">
					<div class="row"><!-- Main row -->

						<?= $this->fetch('content'); ?>

					</div><!-- /.row (main row) -->
				</div><!-- /.container-fluid -->
			</section><!-- /.content (main) -->
			
		</div>
		<!-- /.content-wrapper -->

		<?= $this->element('JeffAdmin.footer') ?>


		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
		
		
	</div>
	<!-- ./wrapper -->

	<?= $this->Html->script([
		'JeffAdmin./plugins/jquery/jquery.min',
		'JeffAdmin./plugins/jquery-ui/jquery-ui.min',
		'JeffAdmin./plugins/bootstrap/js/bootstrap.bundle.min',
		'JeffAdmin./plugins/overlayScrollbars/js/jquery.overlayScrollbars.min',
		'JeffAdmin./plugins/CodeSeven-toastr-50092cc/build/toastr.min',
		'JeffAdmin./plugins/sweetalert2/sweetalert2.all.min',		
		//'JeffAdmin./dist/js/pages/dashboard',
		'JeffAdmin./dist/js/adminlte',
	]); ?>

	<!-- BEGIN Custom JS -->
	<?= $this->fetch('scriptBottom'); ?>

	<!-- END Custom JS -->
	
	<script>
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			//"positionClass": "toast-top-right",
			"positionClass": "toast-bottom-left",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
		//toastr.success('Are you the 6 fingered man?')


		// --------- bootstrap tooltips ---------
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-tooltip="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		  return new bootstrap.Tooltip(tooltipTriggerEl)
		})

	</script>

	<?php echo $this->Flash->render(); ?>

	<!-- BEGIN Custom script -->
	<?= $this->fetch('javaScriptBottom'); ?>
	
	<!-- END Custom script -->

</body>
</html>
