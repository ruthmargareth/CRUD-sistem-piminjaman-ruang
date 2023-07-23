<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>

<div class="content-wrapper">
	<section class="content-header">
    	<h1><i class="fa fa-info-circle"></i> Detail Ruangan - <?= $ruangan->nama_ruangan;?></h1>
    	<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li><a href="<?php echo base_url('data');?>">&nbsp; Data Ruangan</a></li>
			<li class="active"></i>&nbsp;  Detail Ruangan</li>
    	</ol>
  	</section>

  	<section class="content">
		<div class="row">
	    	<div class="col-md-12">
	        	<div class="box box-primary">
                	<div class="box-header with-border">
						<h4><?= $ruangan->nama_ruangan;?></h4>
                	</div>

			    	<div class="box-body">
						<table class="table table-bordered">
							<tr>
								<td style="width:20%">ID</td>
								<td><?= $ruangan->ruangan_id;?></td>
							</tr>
							<tr>
								<td>Gedung</td>
								<td><?= $ruangan->gedung;?></td>
							</tr>
							<tr>
								<td>Jenis Ruangan</td>
								<td><?= $ruangan->jenis_ruangan;?></td>
							</tr>
							<tr>
								<td>Nama Ruangan</td>
								<td><?= $ruangan->nama_ruangan;?></td>
							</tr>					
						</table>
		        	</div>
	        	</div>
	    	</div>
    	</div>
	</section>
</div>

