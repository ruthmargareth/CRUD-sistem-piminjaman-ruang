<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-plus"> </i> Tambah Ruangan</h1>
        <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li><a href="<?php echo base_url('data');?>">&nbsp; Data Ruangan</a></li>
			<li class="active"></i>&nbsp;  Tambah Ruangan</li>
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
									<select class="form-control select2" required="required"  name="gedung">
										<option disabled selected value> -- Pilih Gedung -- </option>
										<option>Perpustakaan</option>
                                        <option>AA</option>
                                        <option>GSG</option>
									</select>
								</div>
                                <div class="form-group">
									<label>Jenis Ruangan</label>
									<select class="form-control select2" required="required"  name="jenis_ruangan">
										<option disabled selected value> -- Pilih Jenis Ruangan -- </option>
										<option>Perpustakaan</option>
                                        <option>Kelas</option>
                                        <option>Lab</option>
                                        <option>Aula</option>
                                        <option>Auditorium</option>
									</select>
								</div>
                                <div class="form-group">
                                    <label>Nama Ruangan</label>
                                    <input type="text" class="form-control" name="nama_ruangan"  placeholder="Contoh: Lab 105">
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <input type="hidden" name="tambah" value="tambah">
                            <button type="submit" class="btn btn-success btn-md">Submit</button> 
                            <a href="<?= base_url('transaksi');?>" class="btn btn-danger btn-md">Kembali</a>
                        </div>
                    </form>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
