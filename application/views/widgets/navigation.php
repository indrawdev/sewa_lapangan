<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand pull-left" href="<?php echo base_url(); ?>">SEWA LAPANGAN</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <?php 
          if ($this->session->userdata('login') != TRUE) { 
        ?>
        <li><a href="<?php echo base_url('login'); ?>">Masuk</a></li>
        <?php } ?>
        <?php if ($this->session->userdata('login') == TRUE) { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('lapangan'); ?>">Lapangan</a></li>
            <li><a href="<?php echo base_url('pelanggan'); ?>">Pelanggan</a></li>
            <li><a href="<?php echo base_url('tarif'); ?>">Tarif</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaksi <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('sewa'); ?>">Sewa</a></li>
            <li><a href="<?php echo base_url('pembayaran'); ?>">Pembayaran</a></li>
          </ul>
        </li>
        <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if ($this->session->userdata('login') == TRUE) { ?> 
          <li><a href="<?php echo base_url('admin/logout'); ?>">Logout</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

