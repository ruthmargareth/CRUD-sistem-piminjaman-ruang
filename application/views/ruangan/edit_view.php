<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-edit"></i>  Update Ruangan - <?= $ruangan->nama_ruangan;?></h1>
        <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li><a href="<?php echo base_url('data');?>">&nbsp; Data Ruangan</a></li>
			<li class="active"></i>&nbsp;  Update Ruangan</li>
        </ol>
    </section>

    <section class="content">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="box box-primary">
                    <div class="box-header with-border">
                </div>

			    <div class="box-body">
                    <form action="<?php echo base_url('data/prosesruangan');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Gedung</label>
                                    <select name="gedung" class="form-control" required="required">
										<option <?php if($ruangan->gedung == 'Perpustakaan'){ echo 'selected';}?>>Perpustakaan</option>
										<option <?php if($ruangan->gedung == 'AA'){ echo 'selected';}?>>AA</option>
                                        <option <?php if($ruangan->gedung == 'GSG'){ echo 'selected';}?>>GSG</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Ruangan</label>
                                    <select name="jenis_ruangan" class="form-control" required="required">
										<option <?php if($ruangan->jenis_ruangan == 'Perpustakaan'){ echo 'selected';}?>>Perpustakaan</option>
										<option <?php if($ruangan->jenis_ruangan == 'Kelas'){ echo 'selected';}?>>Kelas</option>
                                        <option <?php if($ruangan->jenis_ruangan == 'Lab'){ echo 'selected';}?>>Lab</option>
                                        <option <?php if($ruangan->jenis_ruangan == 'Aula'){ echo 'selected';}?>>Aula</option>
                                        <option <?php if($ruangan->jenis_ruangan == 'Auditorium'){ echo 'selected';}?>>Auditorium</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Ruangan</label>
                                    <input type="text" class="form-control" value="<?= $ruangan->nama_ruangan;?>" name="nama_ruangan" placeholder="Contoh: Lab 105">
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <input type="hidden" name="edit" value="<?= $ruangan->id_ruangan;?>">
                            <button type="submit" class="btn btn-success btn-md">Edit Data</button>
                            <a href="<?= base_url('data');?>" class="btn btn-danger btn-md">Kembali</a>
                        </div>
                    </form>
		        </div>
	        </div>
	    </div>
    </section>
</div>
