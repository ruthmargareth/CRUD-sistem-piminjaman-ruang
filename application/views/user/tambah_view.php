<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-plus"></i> Tambah Anggota</h1>
        <ol class="breadcrumb">
		    <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li><a href="<?php echo base_url('user');?>">&nbsp; Data Anggota</a></li>
		    <li class="active">&nbsp; Tambah Anggota</li>
        </ol>
    </section>

    <section class="content">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="box box-primary">
                    <div class="box-header with-border">
                </div>
                
			    <div class="box-body">
                    <form action="<?php echo base_url('user/add');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <input type="text" class="form-control" name="nama_anggota" required="required" placeholder="Nama Anggota">
                                </div>
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" class="form-control" name="NIM" required="required" placeholder="NIM">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label><br/>
                                    <input type="radio" name="jenis_kelamin" value="Laki-Laki" required="required"> Laki-Laki <br/>
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" required="required"> Perempuan
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" name="email" required="required" placeholder="email">
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-md">Submit</button>
                            <a href="<?= base_url('user');?>" class="btn btn-danger btn-md">Kembali</a>
                        </div>
                    </form>
		        </div>
	        </div>
	    </div>
    </section>
</div>
