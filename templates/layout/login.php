<?php use Cake\Core\Configure; ?>
<?php 
	$controller = $this->request->getParam('controller');
	$action = $this->request->getParam('action');
	
	$prefix = strtolower( $this->request->getParam('prefix', '') );
	if($this->request->getParam('prefix') == null){
		$prefix = 'main';
	}
	//debug( $this->request->getParam('controller') ); 
?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<?= $this->Html->charset() ?>
	
	<?= $this->Html->meta('viewport', Configure::read('Theme.' . $prefix . '.meta.viewport') ) ?>
	<!--meta name="viewport" content="width=device-width, initial-scale=1"-->
	
	<title><?php echo Configure::read('Theme.' . $prefix . '.title'); ?> | <?php echo $this->fetch('title'); ?></title>
	<?= $this->Html->meta('description', Configure::read('Theme.' . $prefix . '.meta.description') ) ?>
	
	<?= $this->Html->meta('author', Configure::read('Theme.' . $prefix . '.meta.author') ) ?>

	<?= $this->fetch('meta') ?>
<?= $this->Html->meta('favicon.ico', 'JeffAdmin./favicons/favicon.ico', ['type' => 'icon']) ?>
	<?= $this->Html->css([
		'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
		'JeffAdmin./plugins/fontawesome-free/css/all.min',
		'JeffAdmin./plugins/font-awesome/css/font-awesome.min',
		'JeffAdmin./plugins/icheck-bootstrap/icheck-bootstrap.min',
		'JeffAdmin./plugins/CodeSeven-toastr-50092cc/build/toastr.min',
		'JeffAdmin./dist/css/adminlte.min',
		'JeffAdmin./dist/css/jeffadmin',
	]); ?>

</head>
<?php
	$class = "login";
	if($action == 'login' || $action == 'requestResetPassword' || $action == 'changePassword'){
		$class = "login";
	}
	if($action == 'register'){
		$class = "register";
	}
?>
<body class="hold-transition <?= $class ?>-page login">

	<?= $this->fetch('content'); ?>

	<?= $this->Html->script([
		'JeffAdmin./plugins/jquery/jquery.min',
		'JeffAdmin./plugins/bootstrap/js/bootstrap.bundle.min',
		'JeffAdmin./plugins/CodeSeven-toastr-50092cc/build/toastr.min',
		'JeffAdmin./dist/js/adminlte',
	]); ?>

	<script>
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": false,
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

	<?= $this->Flash->render(); ?>
	<?= $this->Flash->render('auth'); ?>

</body>
</html>
