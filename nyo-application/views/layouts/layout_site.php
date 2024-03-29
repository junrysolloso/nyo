<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' ); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>nyo-uploads/dinagat-coders-icon.png" />
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>nyo-assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>nyo-assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>nyo-assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>nyo-assets/vendors/jquery-toast-plugin/jquery.toast.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>nyo-assets/css/style-main.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>nyo-assets/css/admin.css">

    <?php echo $_styles; ?>
  </head>
  <body <?php echo $body_class; ?>>
    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
    <?php echo $content; ?>

    <script type="text/javascript" src="<?php echo base_url(); ?>nyo-assets/vendors/js/vendor.bundle.base.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>nyo-assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>nyo-assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>nyo-assets/vendors/inputmask/jquery.inputmask.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>nyo-assets/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>nyo-assets/vendors/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>nyo-assets/js/helper_toast.js"></script>

    <?php echo $_scripts; ?>
  </body>
</html> 
