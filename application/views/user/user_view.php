<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>

<div class="content-wrapper">
    <section class="content-header">
        <h1> <i class="fa fa-user"></i> Data Anggota</h1>
        <ol class="breadcrumb">
		    <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
		    <li class="active">&nbsp; Data Anggota</li>
        </ol>
    </section>

    <section class="content">
        <?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="user/tambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Anggota</button></a>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Jenis kelamin</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;foreach($user as $isi){?>
                                        <tr>
                                            <td><?= $no;?></td>
                                            <td><?= $isi['anggota_id'];?></td>
                                            <td><?= $isi['nama_anggota'];?></td>
                                            <td><?= $isi['NIM'];?></td>
                                            <td><?= $isi['jenis_kelamin'];?></td>
                                            <td><?= $isi['email'];?></td>
                                            <td>
                                                <a href="<?= base_url('user/edit/'.$isi['id_anggota']);?>">
                                                    <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                                </a>
                                                <a href="<?= base_url('user/detail/'.$isi['id_anggota']);?>">
                                                    <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                                </a>
                                                <a href="<?= base_url('user/del/'.$isi['id_anggota']);?>" onclick="return confirm('Anda yakin user akan dihapus ?');">
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
