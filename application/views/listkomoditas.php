<?php 
    $data_u = $this->session->userdata('data_user');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">List Komoditas</h1>
<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
<?php if($this->session->flashdata('message')!==null){?>
    <div class="alert <?php echo ($this->session->flashdata('error')!==null?'alert-danger':'alert-success');?>" role="alert">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
<?php } ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Komoditas</th>
                        <th>Harga</th>
                        <th>Tanggal Survey</th>
                        <th>Verif</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=1;foreach ($komoditas_data as $key => $value) {?>
                        <tr>
                            <td><?=$count;$count++?></td>
                            <td><?=$value->komoditas_nama?></td>
                            <td><?=$value->komoditas_harga?></td>
                            <td><?=$value->komoditas_tanggal?></td>
                            <td>
                                <?php if($value->komoditas_acc==3){?>
                                    <?php if($data_u['user_role']==1){?>
                                        <a class="btn btn-success" href="<?=site_url('listkomoditas/acc/'.$value->komoditas_id)?>">
                                                <i class="fa fa-check"></i>
                                                accept
                                        </a>
                                        <a class="btn btn-danger" href="<?=site_url('listkomoditas/reject/'.$value->komoditas_id)?>">
                                            <i class="fa fa-times"></i>
                                            reject
                                        </a>
                                    <?php }else{echo "requested";} ?>
                                <?php }else if($value->komoditas_acc==2){
                                        echo "accepted";
                                     }else{ 
                                        echo "rejected";
                                    } 
                                ?>
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>
<!-- /.container-fluid -->