<?php 
	$uAuth = Auth::isAuth();
?>

<!DOCTYPE html>
<html>
<head>
<base href="<?php echo $config["siteUrl"]?>">
<title>Helpdesk</title>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-clockpicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="icon" href="assets/img/helpdesk.png">
<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<meta charset="UTF-8">
<body>
	<?php if($uAuth): ?>
		<nav class="navbar navbar-default navbar-inverse" id="mainNav">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#mainNav">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#" target="_self">HelpDesk DOA</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="collapse-mainNav">
					<ul class="nav navbar-nav navbar-nav">
						<li id='mainNav-navzone-1-li-1'><a id='mainNav-navzone-1-link-1'
							href="#">Créer un ticket</a></li>
						<li id='mainNav-navzone-1-li-2'><a id='mainNav-navzone-1-link-2'
							href="<?=$config['siteUrl']?>tickets">Tickets</a></li>
						<li id='mainNav-navzone-1-li-3'><a id='mainNav-navzone-1-link-3'
							href="<?=$config['siteUrl']?>faqs">Foire aux questions</a></li>
					</ul>
				</div>
			
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	<?php endif; ?>
	<div class="bs-docs-header">
		<div class="container">
			<div class="header">
				<h1>HelpDesk DOA</h1>
				<p>Assistance, support et gestion des incidents.</p>
				<?php //if($uAuth): ?>
					<div class="pull-right">
						<?php
						echo $infoUser;
						?>
					</div>
				<?php //endif; ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="second-header"></div>
	<?php if($uAuth): ?>
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="<?php echo $config["siteUrl"]?>"><span class="glyphicon glyphicon-home"
						aria-hidden="true"></span>&nbsp;Accueil</a></li>
			</ol>
		</div>
	<?php endif; ?>
