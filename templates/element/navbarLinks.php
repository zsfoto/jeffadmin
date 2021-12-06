<?php 
	$prefix = $this->request->getParam('prefix');
	$controller = $this->request->getParam('controller');
	$action = $this->request->getParam('action');
	if(!isset($action)){ $action = ''; }
	if(!isset($buttons)){ $buttons = []; }
	
?>

    <!-- Left navbar links -->
    <ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>

<?php if($prefix == null){ ?>

<?php 	if($action == 'index'){ ?>
			<li class="nav-item d-none d-sm-inline-block ml-3">
				<?php //= $this->Html->link('<span class="btn-label"><i class="icon-list"></i></span>' . __d('jeff_admin', 'PDF'), ['action' => 'add'], ['class'=>'btn btn-outline-nav swal-link-confirm', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Add new item')]) ?>
				<?php //= $this->Html->link('<span class="btn-label"><i class="icon-list"></i></span>' . __d('jeff_admin', 'HTML'), ['action' => 'add'], ['class'=>'btn btn-outline-nav swal-link-confirm', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Add new item')]) ?>
<?php 		if(isset($this->User) && $controller == 'Users'){ ?>
				<?= $this->Html->link('<span class="btn-label"><i class="icon-plus"></i></span>' . __d('jeff_admin', 'Add new'), ['action' => 'add'], ['class'=>'btn btn-outline-nav swal-link-confirm', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Add new item')]) ?>
<?php 		} ?>
			</li>
<?php 	} ?>

<?php } ?>


<?php if($prefix == 'Admin'){ ?>

<?php 	if($action == 'index'){ ?>

			<li class="nav-item d-none d-sm-inline-block ml-3">
				<?= $this->Html->link('<span class="btn-label"><i class="icon-plus"></i></span>' . __d('jeff_admin', 'Add new'), ['action' => 'add'], ['class'=>'btn btn-outline-nav swal-link-confirm', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Add new item')]) ?>
			</li>
<?php 	} ?>

<?php 	if($action == 'add'){ ?>
			<li class="nav-item d-none d-sm-inline-block ml-3">
				<?= $this->Html->link('<span class="btn-label"><i class="fa fa-arrow-left"></i></span>' . __d('jeff_admin', 'Back to list'), '#', ['url' => $this->Url->build(['action' => 'index']), 'class'=>'btn btn-outline-nav swal-link-confirm', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Back to list without save')]) ?>
			</li>
			<li class="nav-item d-none d-sm-inline-block ml-4">
				<?= $this->Html->link('<span class="btn-label"><i class="fa fa-save"></i></span>' . __d('jeff_admin', 'Save'), '#', ['id' => 'button-submit', 'class'=>'btn btn-outline-nav-success', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Save and back to list')]) ?>
			</li>

<?php 	} ?>

<?php 	if($action == 'edit'){ ?>
			<li class="nav-item d-none d-sm-inline-block ml-3">
				<?= $this->Html->link('<span class="btn-label"><i class="fa fa-arrow-left"></i></span>' . __d('jeff_admin', 'Back to list'), '#', ['url' => $this->Url->build(['action' => 'index']), 'class'=>'btn btn-outline-nav swal-link-confirm', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Back to list without save')]) ?>
			</li>
			<li class="nav-item d-none d-sm-inline-block ml-4">
				<?= $this->Html->link('<span class="btn-label"><i class="fa fa-save"></i></span>' . __d('jeff_admin', 'Save'), '#', ['id' => 'button-submit', 'class'=>'btn btn-outline-nav-success', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Save and back to list')]) ?>
			</li>
			<li class="nav-item d-none d-sm-inline-block ml-4">
				<?= $this->Html->link('<span class="btn-label"><i class="icon-plus"></i></span>' . __d('jeff_admin', 'Add new'), '#', ['url' => $this->Url->build(['action' => 'add']), 'class'=>'btn btn-outline-nav swal-link-confirm', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Add new item')]) ?>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<?php 
					if(isset($id)){
						echo $this->Html->link('<span class="btn-label"><i class="icon-eye"></i></span>' . __d('jeff_admin', 'View'), 
							//['action' => 'view', $id], 
							'#', 
							['url' => $this->Url->build(['action' => 'view', $id]), 'class'=>'btn btn-outline-nav swal-link-confirm', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip'=>'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'View this item')]
						);
					}
				?>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<?php 
					if(isset($id) && isset($name)){
						echo $this->Form->postLink('<span class="btn-label"><i class="icon-minus"></i></span>' . __d('jeff_admin', 'Delete'),
							['action' => 'delete', $id],
							['id' => 'swal-link-delete', 'class'=>'btn btn-outline-nav-danger swal-link-delete', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Delete this record!')]
						);
					}
				?>
			</li>
<?php 	} ?>

<?php 	if($action == 'view'){ ?>
			<li class="nav-item d-none d-sm-inline-block ml-3">
				<?= $this->Html->link('<span class="btn-label"><i class="fa fa-arrow-left"></i></span>' . __d('jeff_admin', 'Back to list'), ['action' => 'index'], ['class'=>'btn btn-outline-nav', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Back to list')]) ?>
			</li>
			
			<li class="nav-item d-none d-sm-inline-block ml-3">
				<?= $this->Html->link('<span class="btn-label"><i class="icon-plus"></i></span>' . __d('jeff_admin', 'Add new'), ['action' => 'add'], ['class'=>'btn btn-outline-nav-success', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Add new item')]) ?>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<?php 
				if(isset($id)){
					echo $this->Html->link('<span class="btn-label"><i class="icon-edit"></i></span>' . __d('jeff_admin', 'Edit'), ['action' => 'edit', $id], ['class'=>'btn btn-outline-nav', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Edit this item')]);
				}
				?>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<?php 
				if(isset($id) && isset($name)){
					echo $this->Form->postLink('<span class="btn-label"><i class="icon-minus"></i></span>' . __d('jeff_admin', 'Delete'),
						['action' => 'delete', $id],
						['id' => 'swal-link-delete', 'confirm' => __d('jeff_admin', 'Are you sure you want to delete: {0}?', $name), 'class'=>'btn btn-outline-nav-danger swal-link-delete', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title'=>__d('jeff_admin', 'Delete this record!')]
					);
				}
				?>
			</li>
<?php 	} ?>

<?php } ?>

	  
<?php foreach($buttons as $button){ ?>
		<li class="nav-item d-none d-sm-inline-block">
			<?= $this->Html->link('<span class="btn-label">' . $button['icon'] . '</span>' . $button['title'], 
				['controller' => $button['controller'], 'action' => $button['action']], 
				['class'=>'btn btn-outline-nav-' . $button['style'], 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title' => $button['title'] ] )
			?>
		</li>
<?php } ?>

<?php if(isset($search) && $search !== null){ ?>
		<li class="nav-item d-none d-sm-inline-block">
			<?= $this->Html->link(__d('jeff_admin', 'Clear filter'), 
				['action' => 'index','clear-filter'], 
				['class'=>'btn btn-outline-nav-danger', 'role'=>'button', 'escape'=>false,  'data-bs-tooltip' => 'tooltip', 'data-bs-placement' => 'bottom', 'title' => __d('jeff_admin', 'Clear filter') ] )
			?>
		</li>
<?php } ?>

<?php
 /*
<h4 class="card-title" style="text-align: center;">
	echo __d('jeff_admin', 'Table name');
	if(isset($search) && $search !== null){
		echo " • ";
		echo __d('jeff_admin', 'Search filter') . ": <b>" . $search . "</b>";
		echo $this->Form->create(null, ['url' => ['action' => 'index'],  'class' => 'form-inline form-clear-search']);
			$this->Form->control('s', ['type' => 'hidden', 'aria-label' => __d('jeff_admin', 'Clear search'), 'label' => false, 'div' => false, 'value' => '']);
?>
			<input type="submit" class="btn btn-card-header-clear-search" value="Keresés törlése" />
<?php
		echo $this->Form->end();
	}
</h4>
*/ ?>




<?php /*
	  
	  <?php if( $config['link_navbar_links'] !== null && $config['link_navbar_links']){ ?>

		$navBarButtons = [];
/*
		$navBarButtons = [
			'buttons' => [
				[
					'title' => 'Programs',
					'controller' => 'Programs',
					'action' => 'index',
					'style' => 'secondary',
					'icon' => '<i class="icon-list"></i>',
				],
				[
					'title' => 'Packages',
					'controller' => 'Packages',
					'action' => 'index',
					'style' => 'secondary',
					'icon' => '<i class="icon-list"></i>',
				],
				[
					'title' => 'Cities',
					'controller' => 'Cities',
					'action' => 'index',
					'style' => 'secondary',
					'icon' => '<i class="icon-list"></i>',
				],
				[
					'title' => 'PDF',
					'controller' => 'Cities',
					'action' => 'index',
					'style' => 'secondary',
					'icon' => '<i class="icon-list"></i>',
				],
			],		
		]
		<?= $this->element('JeffAdmin.navbarLinks', $navBarButtons) ?>
	  <?php } ?>
*/		
?>	  
    </ul>
	
	<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>

		$(document).ready( function(){

			var form_original_data = $("#main-form").serialize(); 
			
			$(".swal-link-confirm").attr("onclick", "").unbind("click");
			
			$(document).on('click', '.swal-link-confirm', function () {
				if ($("#main-form").serialize() != form_original_data) {
					Swal.fire({
						title: '<?= __d('jeff_admin', "Do you leave this page without save?") ?>',
						text: '<?= __d('jeff_admin', "You will not be able to revert this. The changes will be lost.") ?>',
						icon: 'question',
						animation : false,
						type: 'warning',
						//confirmButtonColor: "#DD6B55",
						showCancelButton: true,
						confirmButtonText: '<?= __d('jeff_admin', "Yes") ?>',
						denyButtonText: '<?= __d('jeff_admin', "Cancel") ?>',
					}).then((result) => {
						if (result.value) {
							window.location.href = $(this).attr("url");
						}
					});
				}else{
					window.location.href = $(this).attr("url");
				}
			});


			$(document).on('click', '#button-submit', function () {
				$("#main-form").submit();
			});		


			$(".swal-link-delete").attr("onclick", "").unbind("click");
		
			$(document).on('click', '.swal-link-delete', function () {
				Swal.fire({
					title: '<?= __d('jeff_admin', "Do you want to delete this record?") ?>',
					text: '<?= __d('jeff_admin', "You will not be able to revert this!") ?>',
					icon: 'question',
					animation : false,
					type: 'warning',
					confirmButtonColor: "#DD6B55",
					showCancelButton: true,
					confirmButtonText: '<?= __d('jeff_admin', "Delete") ?>',
					denyButtonText: '<?= __d('jeff_admin', "Cancel") ?>',
				}).then((result) => {
					if (result.value) {
						$("#swal-link-delete").parent().find('form').submit();
					}
				});
			});
		
		});

	<?php $this->Html->scriptEnd(); ?>

<?php /*						
	// Simulate a mouse click:
	window.location.href = "http://www.w3schools.com";

	// Simulate an HTTP redirect:
	window.location.replace("http://www.w3schools.com");						
*/ ?>
