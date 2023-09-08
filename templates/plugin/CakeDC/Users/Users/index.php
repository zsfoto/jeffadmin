<?php 
	use Cake\Core\Configure;
	
	//$session 			= $this->getRequest()->getSession();
	//$prefix 			= strtolower( $this->request->getParam('prefix') );	
	//$controller 		= $this->request->getParam('controller');	// for DB click on <tr>
	//$action 			= $this->request->getParam('action');		// for DB click on <tr>
	//$passedArgs 		= $this->request->getParam('pass');			// for DB click on <tr>
	
	$config = Configure::read('Theme.' . $prefix);	
	//-------> More config from \config\jeffadmin.php <------
	//$config['index_show_id'] 			= true;
	//$config['index_show_visible'] 	= true;
	//$config['index_show_pos'] 		= true;
	//$config['index_show_created'] 	= true;
	//$config['index_show_modified'] 	= true;
	//$config['index_show_actions'] 	= true;
	//$config['index_enable_view'] 		= true;
	//$config['index_enable_edit'] 		= true;
	$config['index_enable_delete'] 	= false;
	//$config['index_enable_db_click'] 	= true;
	//$config['index_db_click_action'] 	= 'edit';	// edit, view
	//
	//$url = $this->Url->build(['prefix' => $prefix, 'controller' => $controller , 'action' => $config['index_db_click_action']]);

?>
		<div class="index col-12">
            <div class="card card-lightblue">
				<div class="card-header">
					<h4 class="card-title"><?= __('Index') ?>: <?= __('Users') ?><?php
					if(isset($search) && $search != ''){
						echo " &rarr; " . __('filter') . ": <b>" . $search . "</b>";
					}
				?></h4>
					<div class="card-tools">
						<?= $this->element('JeffAdmin.paginateTop') ?>
					</div>				
				</div><!-- ./card-header -->
			  
				<div class="card-body table-responsive p-0 users">
<?php //debug($session->read()); ?>
					<table class="table table-hover table-striped table-bordered text-nowrap">
						<thead>
							<tr>
								<th class="row-id-anchor"></th>
								<th class="role string"><?= $this->Paginator->sort('role', __d('cake_d_c/users', 'Role')) ?></th>
								<th class="name string"><?= $this->Paginator->sort('first_name', __d('cake_d_c/users', 'First Name')) ?> <?= $this->Paginator->sort('last_name', __d('cake_d_c/users', 'Last Name')) ?></th>
								<!--th class="name string"><?php //= $this->Paginator->sort('username', __d('cake_d_c/users', 'Username')) ?></th-->
								<th class="name string"><?= $this->Paginator->sort('email', __d('cake_d_c/users', 'Email')) ?></th>
								<th class="boolean active"><?= $this->Paginator->sort('active', __d('cake_d_c/users', 'Active')) ?></th>
<?php /* if($user->is_superuser){ ?>
								<th class="boolean is-superuser"><?= $this->Paginator->sort('is_superuser', __d('cake_d_c/users', 'Super User')) ?></th>
<?php } */ ?>
<?php if(isset($config['index_show_actions']) && $config['index_show_actions']){ ?>
								<th class="actions"><?= __d('cake_d_c/users', 'Actions') ?></th>
<?php } ?>
							</tr>
						</thead>
						<tbody>
						<?php foreach (${$tableAlias} as $user) : ?>
							<tr row-id="<?= $user->id ?>" controller="<?= $controller ?>" action="<?= $action ?>" aria-expanded="true">
								<td class="row-id-anchor" value="<?= $user->id ?>"><a class="anchor" name="<?= $user->id ?>"></a></td>
								<td class="role string" name="name" value="<?= h($user->role) ?>"><b><?= $roles[$user->role] ?></b></td>
								<td class="name string" name="name" value="<?= h($user->last_name . ' ' . $user->first_name) ?>"><?= h($user->last_name . ' ' . $user->first_name) ?></td>
								<!--td class="name string" name="name" value="<?php //= h($user->username) ?>"><?php //= h($user->username) ?></td-->
								<td class="name string" name="name" value="<?= h($user->email) ?>"><?= h($user->email) ?></td>
								<td class="boolean active" name="name" value="<?= h($user->active) ?>"><?= h($user->active) ?></td>
<?php /* if($user->is_superuser){ ?>
								<td class="boolean is-superuser" name="name" value="<?= h($user->is_superuser) ?>"><?= h($user->is_superuser) ?></td>
<?php } */ ?>
<?php /*
									<?= $this->Html->link(__d('cake_d_c/users', 'View'), ['action' => 'view', $user->id]) ?>
									<?= $this->Html->link(__d('cake_d_c/users', 'Change password'), ['action' => 'changePassword', $user->id]) ?>
									<?= $this->Html->link(__d('cake_d_c/users', 'Edit'), ['action' => 'edit', $user->id]) ?>
									<?= $this->Form->postLink(__d('cake_d_c/users', 'Delete'), ['action' => 'delete', $user->id], ['confirm' => __d('cake_d_c/users', 'Are you sure you want to delete # {0}?', $user->last_name . ' ' . $user->first_name)]) ?>
*/ ?>

								<td class="actions text-center">
									<?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $user->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-warning action-button-view', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('View this user')]) ?>
<?php /*
									<?= $this->Html->link('<i class="fas fa-key"></i>', ['action' => 'changePassword', $user->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-warning action-button-view', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Change password')]) ?>
*/ ?>
									<?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $user->id], ['escape' => false, 'class' => 'btn btn-sm bg-gradient-success action-button-edit', 'data-bs-tooltip'=>'tooltip', 'data-bs-placement'=>'top', 'title' => __('Edit this user')]) ?>
<?php /* if($user->is_superuser){ ?>
									<?php //= $this->Form->postLink('<i class="fas fa-remove"></i>', ['action' => 'delete', $ackey->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $ackey->id), 'class' => 'btn btn-sm bg-gradient-danger action-button-delete']) ?>						
									<?= $this->Form->postLink('', ['action' => 'delete', $user->id], ['class'=>'crose-btn hide-postlink action-button-delete']) ?>
									<a href="javascript:;" class="btn btn-sm btn-danger delete postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this user!") ?>" text="<?= __d('cake_d_c/users', 'Are you sure you want to delete # {0}?', $user->last_name . ' ' . $user->first_name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="icon-minus"></i></a>
<?php } */ ?>
								</td>					  

							</tr>
						<?php endforeach; ?>
						</tbody>
                </table>
				
				<?php //debug(  ); ?>
				
              </div>
              <!-- /.card-body -->
			  
			  <div class="card-footer clearfix">
				<?= $this->element('JeffAdmin.paginateBottom') ?>
				<?php //= $this->Paginator->counter(__('Page  of , showing  record(s) out of  total')) ?>
              </div>			  
			  
            </div>
            <!-- /.card -->
        </div>

	<?php
	if(isset($config['index_show_actions']) && $config['index_show_actions'] && isset($config['index_enable_delete']) && $config['index_enable_delete']){ 
		$this->Html->script(
			[
				'JeffAdmin./dist/js/sweetalert_delete',
			],
			['block' => 'scriptBottom']
		);
	}	
	?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>

	$(document).ready( function(){

<?php 
	$base = '';
	if($this->request->getAttribute('base') != '/'){
		$base = $this->request->getAttribute('base');
	}
?>
		$(".pagination a[href^='<?= $base ?>/<?= $prefix ?>?sort=']").each(function(){
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>", "<?= $base ?>/<?= $prefix ?>?page=1&sort=");
		});
		$(".pagination a[href='<?= $base ?>/<?= $prefix ?>']").each(function(){ 
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>", "<?= $base ?>/<?= $prefix ?>?page=1");
		});
<?php if(isset($controller)){ ?>
		$(".pagination a[href^='<?= $base ?>/<?= $prefix ?>/users?sort=']").each(function(){ 
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>/users?sort=", "<?= $base ?>/<?= $prefix ?>/users?page=1&sort=");
		});
		$(".pagination a[href='<?= $base ?>/<?= $prefix ?>/users']").each(function(){ 
			this.href = this.href.replace("<?= $base ?>/<?= $prefix ?>/users", "<?= $base ?>/<?= $prefix ?>/users?page=1");
		});
<?php } ?>

	});
	<?php $this->Html->scriptEnd(); ?>
