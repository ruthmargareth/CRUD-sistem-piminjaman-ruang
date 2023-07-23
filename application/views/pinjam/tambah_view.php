<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>

<div class="content-wrapper">
	<section class="content-header">
		<h1> <i class="fa fa-plus"> </i>  Tambah Peminjaman</h1>
		<ol class="breadcrumb">
		    <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li><a href="<?php echo base_url('transaksi');?>">&nbsp; Data Peminjaman</a></li>
		    <li class="active">&nbsp; Tambah Peminjaman</li>
        </ol>
  	</section>

  	<section class="content">
		<div class="row">
	    	<div class="col-md-12">
	        	<div class="box box-primary">
                	<div class="box-header with-border">
                </div>

			    <div class="box-body">
                    <form action="<?php echo base_url('transaksi/prosespinjam');?>" method="POST" enctype="multipart/form-data">
						
						<div class="row">
							<div class="col-sm-6">
								<table class="table">
									<tr style="background:#AFD3E2">
										<td colspan="3">Data Peminjaman</td>
									</tr>
									<tr>
										<td>No Peminjaman</td>
										<td>:</td>
										<td>
											<input type="text" name="nopinjam" value="<?= $nop;?>" readonly class="form-control">
										</td>
									</tr>
									<tr>
										<td>Tanggal Pinjam</td>
										<td>:</td>
										<td>
											<input type="date" name="tanggal_pinjam" class="form-control">
										</td>
									</tr>
									<tr>
										<td>Waktu Pinjam</td>
										<td>:</td>
										<td>
											<input type="time" name="waktu_pinjam" class="form-control">
										</td>
									</tr>
									<tr>
										<td>Waktu Selesai</td>
										<td>:</td>
										<td>
											<input type="time" name="waktu_selesai" class="form-control">
										</td>
									</tr>
									<tr>
										<td>ID Anggota</td>
										<td>:</td>
										<td>
											<div class="input-group">
												<input type="text" class="form-control" required autocomplete="off" name="anggota_id" id="search-box" placeholder="Contoh ID Anggota : AG001" type="text" value="">
												<span class="input-group-btn">
													<a data-toggle="modal" data-target="#TableAnggota" class="btn btn-primary"><i class="fa fa-search"></i></a>
												</span>
											</div>
										</td>
									</tr>
									<tr>
										<td>Data Anggota</td>
										<td>:</td>
										<td>
											<div id="result_tunggu"> <p style="color:red">* Belum Ada Hasil</p></div>
											<div id="result"></div>
										</td>
									</tr>
								</table>
							</div>

							<div class="col-sm-6">
								<table class="table table-striped">
									<tr style="background:#AFD3E2">
										<td colspan="3">Pinjam Ruangan</td>
									</tr>
									<tr>
										<td>ID Ruangan</td>
										<td>:</td>
										<td>
											<div class="input-group">
												<input type="text" class="form-control" autocomplete="off" name="ruangan_id" id="ruangan-search" placeholder="Contoh ID Ruangan : RG001" type="text" value="">
												<span class="input-group-btn">
													<a data-toggle="modal" data-target="#Tableruangan" class="btn btn-primary"><i class="fa fa-search"></i></a>
												</span>
											</div>
										</td>
									</tr>
									<tr>
										<td>Data Ruangan</td>
										<td>:</td>
										<td>
											<div id="result_tunggu_ruangan"> <p style="color:red">* Belum Ada Hasil</p></div>
											<div id="result_ruangan"></div>
										</td>
									</tr>
									<tr>
										<td>Deskripsi</td>
										<td>:</td>
										<td>
											<input type="text" class="form-control" name="deskripsi"  placeholder="Contoh: Lab 105">
										</td>
									</tr>
								</table>
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
	</section>
</div>

<!--modal import -->
<div class="modal fade" id="Tableruangan">
	<div class="modal-dialog" style="width:80%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Add Ruangan</h4>
			</div>

			<div id="modal_body" class="modal-body fileSelection1">
				<table id="example1" class="table table-bordered">
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
								<button class="btn btn-primary" id="Select_File2" data_id="<?= $isi['ruangan_id'];?>">
									<i class="fa fa-check"> </i> Pilih
								</button>
								<!-- <a href="<?= base_url('data/ruangandetail/'.$isi['id_ruangan']);?>" target="_blank">
									<button class="btn btn-success"><i class="fa fa-sign-in"></i> Detail</button></a>
								</td> -->
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- /.modal -->
<script>
	$(".fileSelection1 #Select_File2").click(function (e) {
		document.getElementsByName('ruangan_id')[0].value = $(this).attr("data_id");
		$('#Tableruangan').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('transaksi/result_ruangan');?>",
			data:'kode_ruangan='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result_ruangan").html("");
				$("#result_tunggu_ruangan").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result_ruangan").html(html);
				$("#result_tunggu_ruangan").html('');
			}
		});
	});
</script>
	  
<script>
	// AJAX call for autocomplete 
	$(document).ready(function(){
		$("#ruangan-search").keyup(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('transaksi/result_ruangan');?>",
				data:'kode_ruangan='+$(this).val(),
				beforeSend: function(){
					$("#result_ruangan").html("");
					$("#result_tunggu_ruangan").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html){
					$("#result_ruangan").html(html);
					$("#result_tunggu_ruangan").html('');
				}
			});
		});
	});
</script>


 <!--modal import -->
<div class="modal fade" id="TableAnggota">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Add Anggota</h4>
			</div>
			<div id="modal_body" class="modal-body fileSelection1">
				<table id="example3" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Anggota</th>
							<th>Nama Anggota</th>
							<th>NIM</th>
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
								<td><?= $isi['email'];?></td>
								<td>
									<button class="btn btn-primary" id="Select_File1" data_id="<?= $isi['anggota_id'];?>">
										<i class="fa fa-check"> </i> Pilih
									</button>
								</td>
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- /.modal -->
<script>
	$(".fileSelection1 #Select_File1").click(function (e) {
		document.getElementsByName('anggota_id')[0].value = $(this).attr("data_id");
		$('#TableAnggota').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('transaksi/result');?>",
			data:'kode_anggota='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result").html("");
				$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result").html(html);
				$("#result_tunggu").html('');
			}
		});
	});
</script>
	  
<script>
	// AJAX call for autocomplete 
	$(document).ready(function(){
		$("#search-box").keyup(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('transaksi/result');?>",
				data:'kode_anggota='+$(this).val(),
				beforeSend: function(){
					$("#result").html("");
					$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html){
					$("#result").html(html);
					$("#result_tunggu").html('');
				}
			});
		});
	});
</script>
