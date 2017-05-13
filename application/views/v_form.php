<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/stylelogin.css">


</head>

<body>
  <div class="login">
  <h2>Sign Up</h2>
  <fieldset>
		<?php echo form_open('form/aksi'); ?>
			<input type="text" name="username" placeholder="username"><br/>
			<?php echo form_error('username'); ?>
			<input type="password" name="password" placeholder="password"><br/>
			<?php echo form_error('password'); ?>
			<input type="password" name="konfir_password" placeholder="konfir_password"><br/>
			<?php echo form_error('konfir_password'); ?>
      <input type="email" name="email" placeholder="email"><br/>
			<?php echo form_error('email'); ?>
      <input type="nohp" name="nohp" placeholder="nohp"><br/>
			<?php echo form_error('nohp'); ?>
  </fieldset>
  <input type="submit" value="Daftar">
  <div class="utilities">
    <a href="<?php echo base_url('user_login'); ?>">Log in</a>
  </div>
</div>

<?php if($this->session->flashdata('message')){?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>

</body>
</html>
