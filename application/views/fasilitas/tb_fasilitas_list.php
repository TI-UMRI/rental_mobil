<div class="content-wrapper">
    <section class="content-header">
        <h1>Halaman Fasilitas Mobil</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h2 class="box-title">Data Fasilitas Mobil</h2>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div style="margin-top: 4px"  id="message">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <?php echo anchor(site_url('fasilitas/create'), '+ Tambah Fasilitas', 'class="btn btn-primary"'); ?>
                            </div>                  
                        </div>
                        <br><br>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>FASILITAS</th>
                                    <th>KET FASILITAS</th>
                                    <!-- <th>BIAYA</th> -->
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $var): ?>
                                    <tr>
                                        <td><?php echo $key+1 ?></td>
                                        <td><?php echo $var->FASILITAS ?></td>
                                        <td><?php echo $var->KET_FASILITAS ?></td>
                                        <td class="text-center"><a href="<?php echo base_url('fasilitas/update').'/'.$var->ID_FASILITAS ?>">Edit</a>&nbsp;||&nbsp;<a href="<?php echo base_url('fasilitas/read').'/'.$var->ID_FASILITAS ?>">Detail</a>&nbsp;||&nbsp;<a href="<?php echo base_url('fasilitas/delete').'/'.$var->ID_FASILITAS ?>">Delete</a></td>
                                    </tr>    
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>                        
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var t = $("#mytable").dataTable({});
    });
</script>