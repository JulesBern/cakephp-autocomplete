<?php ?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $title_for_layout; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php echo $this->Html->css(array('bootstrap.css', 'bootstrap-responsive.css')); ?>
                <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/smoothness/jquery-ui.css" />
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
		<?php echo $this->Html->script(array('js')); ?>
		<?php echo $this->App->js(); ?>
		<?php echo $this->fetch('meta'); ?>
		<?php echo $this->fetch('css'); ?>
		<?php echo $this->fetch('script'); ?>
		<style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
			}
		</style>
	</head>
	<body>

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<?php echo $this->Form->create('User', array('class' => 'navbar-form pull-right', 'inputDefaults' => array('autocomplete' => 'off'))); ?>
					<?php echo $this->Form->input('search', array('id'=>'search', 'label' => false, 'div' => false, 'type' => 'text')); ?>
					<?php echo $this->Form->button('Search', array('div' => false, 'class' => 'btn btn-primary', 'escape' => false)); ?>
					<?php echo $this->Form->end(); ?>

				</div>
			</div>
		</div>
                <div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>

        </body>
</html>
