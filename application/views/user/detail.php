<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>

<div class="content-wrapper">
	<section class="content-header">
    	<h1><i class="fa fa-info-circle"></i> Detail Anggota - <?= $user->nama_anggota;?></h1>
    	<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li><a href="<?php echo base_url('user');?>">&nbsp; Data Anggota</a></li>
			<li class="active"></i>&nbsp;  Detail Anggota</li>
    	</ol>
  	</section>

  	<section class="content">
		<div class="row">
	    	<div class="col-md-12">
	        	<div class="box box-primary">
                	<div class="box-header with-border">
						<h4><?= $user->nama_anggota;?></h4>
                	</div>

			    	<div class="box-body">
						<table class="table table-bordered">
							<tr>
								<td style="width:20%">ID</td>
								<td><?= $user->anggota_id;?></td>
							</tr>
							<tr>
								<td>Nama Anggota</td>
								<td><?= $user->nama_anggota;?></td>
							</tr>
							<tr>
								<td>NIM</td>
								<td><?= $user->NIM;?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td><?= $user->jenis_kelamin;?></td>
							</tr>			
							<tr>
								<td>Email</td>
								<td><?= $user->email;?></td>
							</tr>					
						</table>
		        	</div>
	        	</div>
	    	</div>
    	</div>
	</section>
</div>


