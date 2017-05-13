<div class="section section-breadcrumbs">
		<div class="container">
				<div class="row">
						<div class="col-md-12">
								<h1>Cek Status</h1>
						</div>
				</div>
		</div>
</div>

<hr>

<div class="table-responsive">
    <table  class="table table-bordered table-striped">
         <thead>
            <tr>
                <th>username</th>
                <th>type</th>
                <th>tanggal</th>
                <th>harga</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($hasilTransaksi as $data) :
            ?>

            <tr>
                <td><?php echo $data->username; ?></td>
                <td><?php echo $data->type; ?></td>
                <td><?php echo $data->tanggal; ?></td>
                <td><?php echo $data->harga; ?></td>
                <td><?php echo $data->status; ?></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>
