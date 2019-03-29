<div class="content-wrapper">
    <section class="content-header">
        <h1>Halaman Fasilitas Mobil</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h2 class="box-title">Detail <?php echo $FASILITAS ?></h2>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <tr><td>FASILITAS</td><td><?php echo $FASILITAS; ?></td></tr>
                            <tr><td>KET FASILITAS</td><td><?php echo $KET_FASILITAS; ?></td></tr>
                            <!-- <tr><td>BIAYA</td><td><?php echo $BIAYA; ?></td></tr> -->
                            <tr><td></td><td><a href="<?php echo site_url('fasilitas') ?>" class="btn btn-default">Cancel</a></td></tr>
                        </table>
                    </div>                        
                </div>
            </div>
        </div>
    </section>
</div>
