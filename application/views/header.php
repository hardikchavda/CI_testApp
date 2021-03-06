<!DOCTYPE HTML>
<!--
	Escape Velocity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Escape Velocity by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
</head>

<body class="homepage is-preload">
	<div id="page-wrapper">

		<!-- Header -->
		<section id="header" class="wrapper">

			<!-- Logo -->
			<div id="logo">
				<h1><a href="index.html">Escape Velocity</a></h1>
				<p>A free responsive site template by HTML5 UP</p>
			</div>

			<!-- Nav -->
			<nav id="nav">
				<ul>
					<li class="current"><a href="index.html">Home</a></li>
					<li>
						<a href="#">Dropdown</a>
						<ul>
							<li><a href="#">Lorem ipsum</a></li>
							<li><a href="#">Magna veroeros</a></li>
							<li><a href="#">Etiam nisl</a></li>
							<li>
								<a href="#">Sed consequat</a>
								<ul>
									<li><a href="#">Lorem dolor</a></li>
									<li><a href="#">Amet consequat</a></li>
									<li><a href="#">Magna phasellus</a></li>
									<li><a href="#">Etiam nisl</a></li>
									<li><a href="#">Sed feugiat</a></li>
								</ul>
							</li>
							<li><a href="#">Nisl tempus</a></li>
						</ul>
					</li>
					<li><a href="left-sidebar.html">Left Sidebar</a></li>
					<li><a href="right-sidebar.html">Right Sidebar</a></li>
					<?php
					if ($this->session->userdata('user_id')) : ?>
						<li><a href="<?= site_url('dashboard/logout'); ?>">Welcome! <?php echo $this->session->userdata('user_id');?></a></li>
					<?php else : ?>
						<li><a href="<?= site_url('dashboard/logout'); ?>">Welcome! Anonymous</a></li>
					<?php endif; ?>
				</ul>
			</nav>

		</section>
