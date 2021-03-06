<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> FCPyS 2016 <?php echo isset($title) ? " - ".$title : "" ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/img/unam-ico.png"/>
</head>
<body>
<?php if( !isset( $disable_nav ) ): ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">UNAM FCPyS</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
      <ul class="nav navbar-nav">
        <li <?php echo isset($active) && $active == 'home'? "class='active'" : ""; ?> ><a href="<?php echo base_url(); ?>">Home</a></li>
        <li <?php echo isset($active) && $active == 'about'? "class='active'" : ""; ?> ><a href="<?php echo base_url(); ?>home/about">About</a></li>
        <li <?php echo isset($active) && $active == 'logout'? "class='active'" : ""; ?> ><a href="<?php echo base_url(); ?>auth/logout">Salir</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<?php endif;  ?>