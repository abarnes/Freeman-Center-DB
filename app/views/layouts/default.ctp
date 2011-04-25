 <?php
 
  header("Cache-Control: no-cache, must-revalidate");
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  flush();
 
  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Freeman Center Donor Database</title>
		
		<?php echo $html->css('cake.generic'); ?>
		<?php echo $html->css('customstyle'); ?>
		<?php echo $html->css('smoothness/jquery-ui-1.8.9.custom'); ?>
		<?php //echo $html->script('jquery-core'); ?>
		<?php echo $html->script('prototype'); ?>
		<?php echo $html->script('jquery-1.4.4.min'); ?>
		<?php echo $html->script('jquery-ui-1.8.9.custom.min'); ?>

	</head>
	<body style="margin-left:10px;margin-right:10px;">
		<div id="header">
		<?php if ($aut==true) { ?>
			<?php if ($admin==true) { ?>
				<ul class="top-nav">
					<li><?php echo $html->link('Search',array('controller'=>'donors','action'=>'search')); ?></li>
					<li><?php echo $html->link('Donors',array('controller'=>'donors','action'=>'index')); ?></li>
					<li><?php echo $html->link('Contact',array('controller'=>'contacts','action'=>'index')); ?></li>
					<li><?php echo $html->link('Events',array('controller'=>'events','action'=>'index')); ?></li>
					<li><?php echo $html->link('Users',array('controller'=>'users','action'=>'index')); ?></li>
					<li><?php echo $html->link('Logout',array('controller'=>'users','action'=>'logout')); ?></li>
				</ul>
			<?php } else { ?>
				<ul class="top-nav">
					<li><?php echo $html->link('Search',array('controller'=>'donors','action'=>'search')); ?></li>
					<li><?php echo $html->link('Donors',array('controller'=>'donors','action'=>'index')); ?></li>
					<li><?php echo $html->link('Contact',array('controller'=>'contacts','action'=>'index')); ?></li>
					<li><?php echo $html->link('Events',array('controller'=>'events','action'=>'index')); ?></li>
					<li><?php echo $html->link('Logout',array('controller'=>'users','action'=>'logout')); ?></li>
				</ul>
			<?php } ?>
		<?php } else { ?>
		<ul class="top-nav">
			<li><?php echo $html->link('Home',array('controller'=>'pages','action'=>'home')); ?></li>
			<li><?php echo $html->link('Login',array('controller'=>'users','action'=>'login')); ?></li>
		</ul>
		<?php } ?>
		</div>
		
		<hr/>
		<h6><?php echo $session->flash('auth'); ?></h6>
		<h6><?php echo $session->flash(); ?></h6>
		
		<?php echo $content_for_layout; ?>
        

        </body>
</html>