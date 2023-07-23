<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>

                <li class="<?php if($this->uri->uri_string() == 'dashboard'){ echo 'active';}?>">
                    <a href="<?php echo base_url('dashboard');?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="<?php if($this->uri->uri_string() == 'user'){ echo 'active';}?>
                    <?php if($this->uri->uri_string() == 'user/tambah'){ echo 'active';}?>
                    <?php if($this->uri->uri_string() == 'user/detail/'.$this->uri->segment('3')){ echo 'active';}?>
                    <?php if($this->uri->uri_string() == 'user/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
                    <a href="<?php echo base_url('user');?>" class="cursor">
                        <i class="fa fa-user"></i> <span>Data Anggota</span>
                    </a>
                </li>

                    <li class="<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukutambah'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukuedit/'.$this->uri->segment('3')){ echo 'active';}?>">
                        <a href="<?php echo base_url("data");?>" class="cursor">
                            <i class="fa fa-list"></i> <span>Data Ruangan</span>
                        </a>
                    </li>

                    <li class="<?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'transaksi/pinjam'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'transaksi/kembalipinjam/'.$this->uri->segment('3')){ echo 'active';}?>">
                        <a href="<?php echo base_url("transaksi");?>" class="cursor">
                            <i class="fa fa-upload"></i> <span>Peminjaman</span>
                        </a>
                    </li>
            </ul>
            <div class="clearfix"></div>
        </section>
    </aside>
