<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

  <!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-sm-12">

          <a href ="user">
            <div class="col-lg-4 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?= $count_pengguna;?></h3>
                  <p>Anggota</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
              </div>
            </div>
          </a>

          <a href="data">
            <div class="col-lg-4 col-xs-6">
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3><?= $count_ruangan;?></h3>
                  <p>Ruangan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-list"></i>
                </div>
                <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
              </div>
            </div> 
          </a>

          <a href="transaksi">
            <div class="col-lg-4 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?= $count_pinjam;?></h3>
                  <p>Peminjaman</p>
                </div>
                <div class="icon">
                  <i class="fa fa-upload"></i>
                </div>
                  <div class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></div>
              </div>
            </div>
          </a>

        </div>
      </div>
    </section>
  </div>