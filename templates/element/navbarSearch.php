<?php 
	$this->Form->setTemplates([
		//'search' => '<input class="icheck-checkbox" type="checkbox" name="{{name}}"{{attrs}} />',
		'searchContainer' => '{{content}}',
		//'searchWrapper' => '{{label}}',
		//'searchContainerError' => '{{content}}',
	]); 

	$action = $this->request->getParam('action');
	//if($action == 'index') {
?>
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
		  <?= $this->Form->create(null, ['url' => ['action' => 'index'],  'class' => 'form-inline']) ?>
		  
            <div class="input-group input-group-sm">
              <!-- input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" -->
			  <?= $this->Form->control('s', ['type' => 'search', 'class' => 'form-control form-control-navbar', 'placeholder' => __d('jeff_admin', 'Search'), 'aria-label' => __d('jeff_admin', 'Search'), 'label' => false, 'div' => false]) ?>
			  
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
			
          <?= $this->Form->end() ?>
		  
        </div>
      </li>
	  
<?php 
	//}
?>


