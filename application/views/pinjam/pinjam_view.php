<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>

<div class="content-wrapper">
	<section class="content-header">
    	<h1><i class="fa fa-upload"></i>  Data Peminjaman</h1>
    	<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active">&nbsp; Data Peminjaman</li>
		</ol>
  	</section>

  	<section class="content">
		<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
		<div class="row">
	    	<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<a href="transaksi/pinjam"><button class="btn btn-primary">
						<i class="fa fa-plus"> </i> Tambah Pinjam</button></a>
					</div>
						
					<div class="box-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped table" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>ID</th>
										<th>Tanggal Pinjam</th>
										<th>Waktu Pinjam</th>
										<th>Waktu Selesai</th>
										<th>Nama Anggota</th>
										<th style="width:10%">Deskripsi</th>
										<th>Ruangan ID</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no=1;
										foreach($pinjam->result_array() as $isi){
											$pinjam_id = $isi['pinjam_id'];
									?>
										<tr>
											<td><?= $no;?></td>
											<td><?= $isi['pinjam_id'];?></td>
											<td><?= $isi['tanggal_pinjam'];?></td>
											<td><?= $isi['waktu_pinjam'];?></td>
											<td><?= $isi['waktu_selesai'];?></td>
											<td><?= $isi['anggota_id'];?></td>
											<td><?= $isi['deskripsi'];?></td>
											<td><?= $isi['ruangan_id'];?></td>
											
											<td style="text-align:center;">
												<a href="<?= base_url('transaksi/detailpinjam/'.$isi['pinjam_id'].'?pinjam=yes');?>">
													<button class="btn btn-primary"><i class="fa fa-eye"></i></button>
												</a>
												<a href="<?= base_url('transaksi/prosespinjam?pinjam_id='.$isi['pinjam_id']);?>" onclick="return confirm('Anda yakin Peminjaman Ini akan dihapus ?');">
													<button	class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
