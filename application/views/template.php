<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="id">
<head>
    <title><?php echo $this->template->title->default("Default title"); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $this->template->description; ?>">
    <?php echo $this->template->meta; ?>
    <?php echo $this->template->stylesheet; ?>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.min.css'); ?>"/>
    
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>"/>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
    <?php echo $this->template->javascript; ?>
</head>
<body>

<?php 
    // This is an example to show that you can load stuff from inside the template file
    echo $this->template->widget("navigation", array('title' => 'SEWA LAPANGAN'));
?>

<div class="container" style="margin-top: 80px;">

  <?php
    // This is the main content partial
    echo $this->template->content;
  ?>

</div>
<!--footer start from here-->
<footer>
  
</footer>
<!--footer start from here-->

<div class="copyright">

</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>