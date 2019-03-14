
<div class="content-wrapper">
        <section class="content-header">
            <h1>Halaman Fasilitas Mobil <small>Detail Data</small></h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">


                        <div class="box-header with-border">
                            <h3 class="box-title">Fasilitas Mobil</h3>
                        </div>
                        
                        <div class="box-body">

                            <table class="table">
                        	    <tr><td>NAMA USER</td><td><?php echo $NAMA_USER; ?></td></tr>
                        	    <tr><td>TGL ORDER</td><td><?php echo $TGL_ORDER; ?></td></tr>
                        	    <tr><td>TOTAL PEMBAYARAN</td><td>Rp. <?php echo number_format($TOTAL_PEMBAYARAN); ?></td></tr>
                        	    <tr><td>TGL PEMBAYARAN</td><td><?php echo $TGL_PEMBAYARAN; ?></td></tr>
                        	    <!-- <tr><td>BUKTI PEMBAYARAN</td><td><img src="<?php echo base_url('upload/bukti_pembayaran/'.$BUKTI_PEMBAYARAN); ?>" width="200px"></td></tr> -->
                        	    <tr><td>STATUS PEMBAYARAN</td><td><?php if ($STATUS_PEMBAYARAN==0){echo "MENUNGGU PEMBAYARAN";}else{echo "SUDAH DIBAYAR"; }?></td></tr>
                        	    <tr><td>STATUS TRANSAKSI</td><td><?php if ($STATUS_TRANSAKSI==0){echo "MENUNGGU DIPROSES";}else if($STATUS_TRANSAKSI==1){echo "BERJALAN"; }else{echo "SELESAI";}?></td></tr>
                                <<!-- tr><td>DENDA</td><td>Rp. <?php echo number_format($STATUS_TRANSAKSI); ?></td></tr>
                                <tr><td>DANA KEMBALI</td><td>Rp. <?php echo number_format($DANA_KEMBALI); ?></td></tr> -->
                        	</table>
                            <br><br><br>
                            <table class='table table-bordered table-striped' id='mytable'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NAMA MOBIL</th>
                                        <th>PLAT</th>
                                        <th>TANGGAL SEWA</th>
                                        <th>TANGGAL AKHIR SEWA</th>
                                        <th>TANGGAL PENGEMBALIAN</th>
                                        <th>HARGA PERHARI</th>
                                        <th>DENDA</th>
                                        <th>TOTAL BAYAR</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    $confirm="disabled";
                                    if ($STATUS_PEMBAYARAN) {
                                        $confirm="";
                                    }
                                    $start=0;
                                    foreach ($DETAIL_TRANSAKSI as $transaksi)
                                    {
                                ?>
                                        
                                        <tr>
                                            <td><?php echo ++$start ?></td>
                                            <td><?php echo $transaksi->NAMA_MOBIL ?></td>
                                            <td><?php echo $transaksi->PLAT_NO_MOBIL ?></td>
                                            <td><?php echo $transaksi->TGL_SEWA ?></td>
                                            <td><?php echo $transaksi->TGL_AKHIR_PENYEWAAN ?></td>
                                            <td><?php echo $transaksi->TGL_PENGEMBALIAN ?></td>
                                            <td>Rp. <?php echo number_format($transaksi->HARGA_MOBIL) ?></td>
                                            <td>Rp. <?php echo number_format($transaksi->DENDA) ?></td>
                                            <td>Rp. <?php echo number_format($transaksi->TOTAL) ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                                    
 
                        </div>                        
                    </div>
                </div><!--/.col (right) -->
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->



        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var t = $("#mytable").dataTable({
                    "scrollX": true
                });
            });
        </script>


