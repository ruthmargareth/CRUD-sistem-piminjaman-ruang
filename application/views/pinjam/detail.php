<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>

<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-info-circle"></i> Detail Peminjaman</h1>
    	<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li><a href="<?php echo base_url('transaksi');?>">&nbsp; Data Peminjaman</a></li>
			<li class="active"></i>&nbsp;  Detail Peminjaman</li>    	
		</ol>
  	</section>

  	<section class="content">
		<div class="row">
	    	<div class="col-md-12">
	        	<div class="box box-primary">
                	<div class="box-header with-border">
                </div>
			    
			    <div class="box-body">
					<div class="row">
						<div class="col-sm-6">
							<table class="table">
								<tr style="background:#AFD3E2">
									<td colspan="3">Data Peminjaman</td>
								</tr>
								<tr>
									<td>Tanggal Pinjam</td>
									<td>:</td>
									<td>
										<?= $pinjam->tanggal_pinjam;?>
									</td>
								</tr>
								<tr>
									<td>Waktu Pinjam</td>
									<td>:</td>
									<td>
										<?= $pinjam->waktu_pinjam;?>
									</td>
								</tr>
								<tr>
									<td>Waktu Selesai</td>
									<td>:</td>
									<td>
										<?= $pinjam->waktu_pinjam;?>
									</td>
								</tr>
								<tr>
									<td>ID Anggota</td>
									<td>:</td>
									<td>
										<?php
											$pin = $this->M_Admin->get_tableid('tb_pinjam','pinjam_id',$pinjam->pinjam_id);
											$no =1;
											foreach($pin as $isi)
											{
												$user = $this->M_Admin->get_tableid_edit('tb_anggota','anggota_id',$isi['anggota_id']);
												echo $no.'. '.$user->anggota_id.'<br/>';
											$no++;}

										?>
									</td>
								</tr>
								<tr>
									<td>Data Anggota</td>
									<td>:</td>
									<td>
										<table class="table">
											<tbody>
												<?php 
													$no=1;
													foreach($pin as $isi)
													{
														$user = $this->M_Admin->get_tableid_edit('tb_anggota','anggota_id',$isi['anggota_id']);
												?>
													<tr>
														<td>Nama Anggota</td>
														<td>:</td>
														<td><?= $user->nama_anggota;?></td>
													</tr>
													<tr>
														<td>NIM</td>
														<td>:</td>
														<td><?= $user->NIM;?></td>
													</tr>
													<tr>
														<td>Jenis Kelamin</td>
														<td>:</td>
														<td><?= $user->jenis_kelamin;?></td>
													</tr>
													<tr>
														<td>Email</td>
														<td>:</td>
														<td><?= $user->email;?></td>
													</tr>
												<?php $no++;}?>
											</tbody>
										</table>		
									</td>
								</tr>
							</table>
						</div>

						<div class="col-sm-6">
							<table class="table">
								<tr style="background:#AFD3E2">
									<td colspan="3">Pinjam Ruangan</td>
								</tr>
								<tr>
									<td>Deskripsi</td>
									<td>:</td>
									<td>
										<?= $pinjam->deskripsi;?>
									</td>
								</tr>
								<tr>
									<td>ID Ruangan</td>
									<td>:</td>
									<td>
										<?php
											$pin = $this->M_Admin->get_tableid('tb_pinjam','pinjam_id',$pinjam->pinjam_id);
											$no =1;
											foreach($pin as $isi)
											{
												$ruangan = $this->M_Admin->get_tableid_edit('tb_ruangan','ruangan_id',$isi['ruangan_id']);
												echo $no.'. '.$ruangan->ruangan_id.'<br/>';
											$no++;}

										?>
									</td>
								</tr>
								<tr>
									<td>Data Ruangan</td>
									<td>:</td>
									<td>
										<table class="table">
											<thead>
												<tr>
													<th>Gedung</th>
													<th>Jenis Ruangan</th>
													<th>Nama Ruangan</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													$no=1;
													foreach($pin as $isi)
													{
														$ruangan = $this->M_Admin->get_tableid_edit('tb_ruangan','ruangan_id',$isi['ruangan_id']);
												?>
													<tr>
														<td><?= $ruangan->gedung;?></td>
														<td><?= $ruangan->jenis_ruangan;?></td>
														<td><?= $ruangan->nama_ruangan;?></td>
													</tr>
												<?php $no++;}?>
											</tbody>
										</table>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="pull-right">
						<a href="<?= base_url('transaksi');?>" class="btn btn-danger btn-md">Kembali</a>
					</div>
		        </div>
	        </div>
	    </div>
	</section>
</div>