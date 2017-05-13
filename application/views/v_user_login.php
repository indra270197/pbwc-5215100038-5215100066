<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/stylelogin.css">


</head>

<body>

  <div class="login">
  <h2>East Java Geophysics Log in member</h2>
  <fieldset>
		<form action="<?php echo base_url('user_login/aksi_login'); ?>" method="post">
    <input type="text" name="username" placeholder="username">
  	<input type="password" name="password" placeholder="password">
  </fieldset>
  <input type="submit" value="Login">
	</form>
  <div class="utilities">
    <a href="<?php echo base_url('form'); ?>">Sign Up &rarr;</a>
  </div>
</div>

<?php if($this->session->flashdata('message')){?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>

</body>
</html>
