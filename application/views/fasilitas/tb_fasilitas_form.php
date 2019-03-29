<div class="content-wrapper">
    <section class="content-header">
        <h1>Halaman Fasilitas Mobil</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h2 class="box-title">Form Fasilitas Mobil</h2>
                    </div>
                    <div class="box-body">
                        <form action="<?php echo $action; ?>" method="post">
                            <div class="form-group">
                                <label for="varchar">FASILITAS <?php echo form_error('FASILITAS') ?></label>
                                <input type="text" class="form-control" name="FASILITAS" id="FASILITAS" placeholder="FASILITAS" value="<?php echo $FASILITAS; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="KET_FASILITAS">KET FASILITAS <?php echo form_error('KET_FASILITAS') ?></label>
                                <textarea class="form-control" rows="3" name="KET_FASILITAS" id="KET_FASILITAS" placeholder="KET FASILITAS"><?php echo $KET_FASILITAS; ?></textarea>
                            </div>
                        <!--<div class="form-group">
                                <label for="decimal">BIAYA <?php echo form_error('BIAYA') ?></label>
                                <input type="text" class="form-control" name="BIAYA" id="BIAYA" placeholder="BIAYA" value="<?php echo $BIAYA; ?>" />
                            </div> -->
                            <input type="hidden" name="ID_FASILITAS" value="<?php echo $ID_FASILITAS; ?>" /> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('fasilitas') ?>" class="btn btn-default">Cancel</a>
                        </form>
                    </div>                        
                </div>
            </div>
        </div>
    </section>
</div>
