<div class="content-wrapper">
    <section class="content-header">
        <h1>Halaman Mobil</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h2 class="box-title">Detail Mobil</h2>
                    </div>
                    <div class="box-body">
                        <h2 style="margin-top:0px"><?php echo $MERK_MOBIL,' ', $NAMA_MOBIL,' - ', $PLAT_NO_MOBIL; ?></h2>
						<table class="table">
						    <tr><td>NAMA MOBIL</td><td><?php echo $NAMA_MOBIL; ?></td></tr>
						    <tr><td>MERK MOBIL</td><td><?php echo $MERK_MOBIL; ?></td></tr>
						    <tr><td>DESKRIPSI MOBIL</td><td><?php echo $DESKRIPSI_MOBIL; ?></td></tr>
						    <tr><td>TAHUN MOBIL</td><td><?php echo $TAHUN_MOBIL; ?></td></tr>
						    <tr><td>KAPASITAS MOBIL</td><td><?php echo $KAPASITAS_MOBIL; ?> Orang</td></tr>
						    <tr><td>HARGA MOBIL</td><td>Rp. <?php echo number_format($HARGA_MOBIL) ?></td></tr>
						    <tr><td>WARNA MOBIL</td><td><?php echo $WARNA_MOBIL; ?></td></tr>
						    <tr><td>TRANSMISI MOBIL</td><td><?php echo $BENSIN_MOBIL; ?></td></tr>
						    <tr><td>PLAT NO MOBIL</td><td><?php echo $PLAT_NO_MOBIL; ?></td></tr>
                            <tr><td>FASILITAS</td><td><?php foreach ($FASILITAS as $row) {
                                echo $row->FASILITAS."&nbsp,&nbsp;";
                            } ?></td></tr>
                            <tr><td>STATUS SEWA</td><td><?php if ($STATUS_SEWA==1) echo "Disewa"; else echo "Tidak Disewa"; ?></td></tr>
						    <tr><td>STATUS MOBIL</td><td><?php if ($STATUS_MOBIL==1) echo "Tersedia"; else echo "Tidak Tersedia"; ?></td></tr>
						    <tr><td>ADDED MOBIL</td><td><?php echo $CREATED_MOBIL; ?></td></tr>
                            <tr><td>IMAGE</td><td><img src="<?php echo base_url('upload/mobil/'.$IMAGE); ?>" width="450px"></td></tr>
						    <tr><td></td><td><a href="<?php echo site_url('mobil') ?>" class="btn btn-default">Cancel</a></td></tr>
						</table>
                    </div>                        
                </div>
            </div>
        </div>
    </section>
</div>
