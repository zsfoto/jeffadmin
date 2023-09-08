<?php
/**
 * Copyright 2010 - 2019, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2018, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

use Cake\Core\Configure;

?>
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="/login" class="h1">
					<?= $this->Html->image('logo.png', ['style' => 'width: 60px; float: left; margin-right: 15px;']) ?>
					<span style="font-weight: bold; float: left;"><?= Configure::read('Theme.main.title') ?></span>
				</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">
					<?php //= __d('cake_d_c/users', 'Please enter your email or username to reset your password') ?>
					<?= __d('cake_d_c/users', 'Reset Password') ?>
				</p>

				<?= $this->Form->create() ?>

					<div class="input-group mb-3">
						<?= $this->Form->control('reference', ['label' => false, 'placeholder' => __('Email'), 'class' => 'form-control', 'required' => true, 'templates'=>['inputContainer' => '{{content}}', 'inputContainerError' => '{{content}}{{error}}']]) ?>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-8">
							&nbsp;
						</div>
						<div class="col-4">
							<?= $this->Form->button(__d('cake_d_c/users', 'Submit'), ['class' => 'btn btn-primary btn-block']); ?>
						</div>
					</div>

				<?= $this->Form->end() ?>

<?php /*
				<div class="social-auth-links text-center mt-2 mb-3">
					<a href="#" class="btn btn-block btn-primary">
						<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
					</a>
					<a href="#" class="btn btn-block btn-danger">
						<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
					</a>
				</div>
				<!-- /.social-auth-links -->
*/ ?>

			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>




<?php /*
<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __d('cake_d_c/users', 'Please enter your username and password') ?></legend>
        <?= $this->Form->control('username', ['label' => __d('cake_d_c/users', 'Username'), 'required' => true]) ?>
        <?= $this->Form->control('password', ['label' => __d('cake_d_c/users', 'Password'), 'required' => true]) ?>
        <?php
        if (Configure::read('Users.reCaptcha.login')) {
            echo $this->User->addReCaptcha();
        }
        if (Configure::read('Users.RememberMe.active')) {
            echo $this->Form->control(Configure::read('Users.Key.Data.rememberMe'), [
                'type' => 'checkbox',
                'label' => __d('cake_d_c/users', 'Remember me'),
                'checked' => Configure::read('Users.RememberMe.checked')
            ]);
        }
        ?>
        <?php
        $registrationActive = Configure::read('Users.Registration.active');
        if ($registrationActive) {
            echo $this->Html->link(__d('cake_d_c/users', 'Register'), ['action' => 'register']);
        }
        if (Configure::read('Users.Email.required')) {
            if ($registrationActive) {
                echo ' | ';
            }
            echo $this->Html->link(__d('cake_d_c/users', 'Reset Password'), ['action' => 'requestResetPassword']);
        }
        ?>
    </fieldset>
    <?= implode(' ', $this->User->socialLoginList()); ?>
    <?= $this->Form->button(__d('cake_d_c/users', 'Login')); ?>
    <?= $this->Form->end() ?>
</div>
*/ ?>
