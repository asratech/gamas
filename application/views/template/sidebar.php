<aside>
  <ul id="sidenav" class="side-nav fixed">
    <li>
      <div class="userView">
        <div class="background">
          <img src="<?php echo base_url('assets/images/nav6.jpg'); ?>">
        </div>
        <a href="profile"><img class="circle" src="<?php echo base_url('assets/images/') . $this->session->userdata('avatar'); ; ?>"></a>
        <a href="profile"><span class="white-text name">Hai, <?php echo ucwords(strtolower($this->session->userdata('nama'))); ?></span></a>
        <a href="profile"><span class="white-text email">Akses anda, <?php echo ucwords(strtolower($this->session->userdata('level'))); ?></span></a>
      </div>
    </li>
    <ul>
      <li><a class="waves-effect" href="<?php echo base_url('dashboard'); ?>"><i class="material-icons">home</i>Dashboard</a></li>
    </ul>
    <!-- Drop Down Menu Transaksi Active -->
    <ul class="collapsible collapsible-accordion">
      <li>
      <div class="collapsible-header"><i class="material-icons">move_to_inbox</i>Transaksi<i class="material-icons right black-text" style="margin-right:0;">arrow_drop_down</i></div>
        <div class="collapsible-body">
          <ul>
            <li><a class="waves-effect" href="<?php echo base_url('events'); ?>"><i class="material-icons">event</i>Input Perizinan</a></li>
            <li><a class="waves-effect" href="<?php echo base_url('loker'); ?>"><i class="material-icons">work</i>List Data Perizinan</a></li>
          </ul>
        </div>
      <li>
    </ul>
    <!-- End Dropdown Menu Transaksi -->
    <!-- Drop Down Menu Laporan Active -->
    <ul class="collapsible collapsible-accordion">
      <li>
      <div class="collapsible-header"><i class="material-icons">assessment</i>Laporan<i class="material-icons right black-text" style="margin-right:0;">arrow_drop_down</i></div>
        <div class="collapsible-body">
          <ul>
            <li><a class="waves-effect" href="<?php echo base_url('events'); ?>"><i class="material-icons">event</i>Laporan Data Perizinan</a></li>
          </ul>
        </div>
      <li>
    </ul>
    <!-- End Dropdown Menu Transaksi -->
    <li>
      <div class="divider"></div>
    </li>
    <?php if($this->session->userdata('level') === 'administrator'): ?>
      <li>
        <a class="subheader">Admin Menu</a>
      </li>
    <ul class="collapsible collapsible-accordion">
      <li>
        <div class="collapsible-header"><i class="material-icons">build</i>Master<i class="material-icons right black-text" style="margin-right:0;">arrow_drop_down</i></div>
          <div class="collapsible-body">
            <ul>
              <li><a class="waves-effect" href="<?php echo base_url('users'); ?>"><i class="material-icons">people</i>Users Managemen</a></li>
              <li><a class="waves-effect" href="<?php echo base_url('cabang'); ?>"><i class="material-icons">where_to_vote</i>Managemen Cabang</a></li>
              <li><a class="waves-effect" href="<?php echo base_url('vendor'); ?>"><i class="material-icons">how_to_reg</i>Managemen Vendor</a></li>
              <li><a class="waves-effect" href="<?php echo base_url('perizinan'); ?>"><i class="material-icons">assistant</i>Managemen Perizinan</a></li>
            </ul>
        </div>
      </li>
    </ul>
  <!-- Pindah ke menu floating
      <li>
        <div class="divider"></div>
      </li>
    <?php endif; ?>
    <li>
        <a class="subheader">User Profile</a>
      </li>
    <li>
      <a class="waves-effect" href="<?php echo base_url('profile#password-tab'); ?>"><i class="material-icons">verified_user</i>Ganti Password</a>
    </li>

    <li>
      <a class="waves-effect"  href="<?php echo base_url('auth/logout'); ?>"><i class="material-icons">exit_to_app</i>Keluar</a>
    </li>
      -->
  </ul>

</aside>