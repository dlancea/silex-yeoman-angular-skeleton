
<?php $view->extend('layout.html.php') ?>

<?php $view['slots']->start('header') ?>
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="">App Name</a>
			</div>
		</div>
	</div>
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('body') ?>
	<br>
	<div class="row">
		<?php if ($error): ?>
			<div class="alert alert-danger"><?php echo $error; ?></div>
		<?php endif; ?>

		<form action="login_check" method="post" role="form">
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" id="username" name="_username" value="<?php echo $last_username ?>" />
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" id="password" name="_password" />
			</div>

			<button type="submit">login</button>
		</form>
	</div>
<?php $view['slots']->stop() ?>
