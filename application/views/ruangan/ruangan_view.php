<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>

<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-list"></i> Data Ruangan</h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
                <li class="active">&nbsp; Data Ruangan</li>
        </ol>
    </section>

    <section class="content">
	    <?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	    <div class="row">
	        <div class="col-md-12">
	            <div class="box box-primary">
                    <div class="box-header with-border">
                            <a href="data/ruangantambah"><button class="btn btn-primary">
                                <i class="fa fa-plus"> </i> Tambah Ruangan</button>
                            </a>
                        </div>

				    <div class="box-body">
    					<div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Gedung</th>
                                        <th>Jenis Ruangan</th>
                                        <th>Nama Ruangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;foreach($ruangan->result_array() as $isi){?>
                                        <tr>
                                            <td><?= $no;?></td>
                                            <td><?= $isi['ruangan_id'];?></td>
                                            <td><?= $isi['gedung'];?></td>
                                            <td><?= $isi['jenis_ruangan'];?></td>
                                            <td><?= $isi['nama_ruangan'];?></td>
                                            <td>
                                                <a href="<?= base_url('data/ruanganedit/'.$isi['id_ruangan']);?>">
                                                    <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <a href="<?= base_url('data/ruangandetail/'.$isi['id_ruangan']);?>">
                                                    <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                                </a>
                                                <a href="<?= base_url('data/prosesruangan?ruangan_id='.$isi['id_ruangan']);?>" onclick="return confirm('Anda yakin ingin menghapus ruangan ini ?');">
                                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $no++;}?>
                                </tbody>
                            </table>
			            </div>
			        </div>
	            </div>
    	    </div>
        </div>
    </section>
</div>
