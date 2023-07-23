<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-edit"></i>  Update Anggota - <?= $user->nama_anggota;?></h1>
        <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li><a href="<?php echo base_url('user');?>">&nbsp; Data Anggota</a></li>
			<li class="active"></i>&nbsp; Update Anggota</li>
        </ol>
    </section>

    <section class="content">
	    <div class="row">
	        <div class="col-md-12">	
			    <?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	            <div class="box box-primary">
                    <div class="box-header with-border">
                </div>

			    <div class="box-body">
                    <form action="<?php echo base_url('user/upd');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <input type="text" class="form-control" name="nama_anggota" value="<?= $user->nama_anggota;?>" required="required" placeholder="Nama Anggota">
                                </div>
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" class="form-control" name="NIM" value="<?= $user->NIM;?>" required="required" placeholder="NIM">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label><br/>
                                    <input type="radio" name="jenis_kelamin" <?php if($user->jenis_kelamin == 'Laki-Laki'){ echo 'checked';}?> value="Laki-Laki" required="required"> Laki-Laki<br/>
                                    <input type="radio" name="jenis_kelamin" <?php if($user->jenis_kelamin == 'Perempuan'){ echo 'checked';}?> value="Perempuan" required="required"> Perempuan
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email"  value="<?= $user->email;?>" class="form-control" name="email" required="required" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <input type="hidden" name="edit" value="<?= $user->id_anggota;?>">
                            <button type="submit" class="btn btn-success btn-md">Edit Data</button>
                            <a href="<?= base_url('user');?>" class="btn btn-danger btn-md">Kembali</a>
                        </div>
                    </form>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
