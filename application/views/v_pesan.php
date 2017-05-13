<!-- Page Title -->
<div class="section section-breadcrumbs">
		<div class="container">
				<div class="row">
						<div class="col-md-12">
								<h1>Pesan Sekarang</h1>
						</div>
				</div>
		</div>
</div>
<div class="section">
		<div class="container">
</div>
</div>
<hr>



<div class="section">
		<div class="container">
				<div class="row">
						<!-- start Pesan -->
						<div class="col-md-4 col-sm-6">



							<?php echo form_open('pesan/aksi'); ?>
								<div class="form-group">
								<label>Nama</label><br/>
								<input type="text" class="form-control" name="username" value="<?php echo $this->session->userdata('nama'); ?>" readonly ><br/>
								</div>
								<?php echo form_error('username'); ?>

								<div class="form-group">
								<label>Type</label><br/>
								<select name="type" class="form-control">
						      <option value="geolistrik">geolistrik</option>
						      <option value="geomagnet">geomagnet</option>
						      <option value="gravity">gravity</option>
						      <option value="microtremor">microtremor</option>
						    </select><br/>
								</div>
								<?php echo form_error('type'); ?>

							<div class="form-group">
								<label>Tanggal(dd/mm/yyyy) ex: 01/01/2001 </label><br/>
								<input class="form-control" type="text" name="tanggal"><br/>
								</div>
								<?php echo form_error('tanggal'); ?>

								<div class="form-group">
						    <label>Alamat Lengkap (Alamat, Kecamatan, Kota/Kabupaten, Provinsi)</label><br/>
								<textarea class="form-control" name="lokasi" class="form-control"></textarea><br/>
								</div>
								<?php echo form_error('lokasi'); ?>
								<!--=======date picker=======

								//=========================-->

								<input  class="btn btn-default" type="submit" value="Simpan">

							<?php if($this->session->flashdata('pesan')){?>
							  <div class="alert alert-success">
							    <?php echo $this->session->flashdata('pesan')?>
							  </div>
							<?php } ?>






						</div>
						<!-- End Pesan -->
						<div class="col-md-4 col-sm-6">
						</div>
				</div>
		</div>
</div>
</hr>
