<?php $view->extend('layout.html.php') ?>

<?php $view['slots']->start('header') ?>
	<?php echo $view->render('Template/header.html.php') ?>
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('body') ?>
	<div ng-view></div>

	<script type="text/ng-template" id="content.html">
		<?php echo $view->render('Template/content.html.php') ?>
	</script>

	<script>
		window.init_data = <?php echo $data_json ?>;
	</script>

<?php $view['slots']->stop() ?>
