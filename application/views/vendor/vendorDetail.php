<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content light-blue lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <div class="row">
          <div class="input-field col s12 m6">
              <input readonly id="nama_vendor" name="nama_vendor" type="text" value="<?php echo $vendor->nama_vendor; ?>">
              <label for="nama_vendor" class="">Nama Vendor</label>
          </div>
          <div class="input-field col s12 m12">
              <input readonly id="telepon_vendor" name="contact" type="text" value="<?php echo $vendor->telepon_vendor; ?>">
              <label for="contact" class="">Telepon Vendor</label>
          </div>
          <div class="input-field col s12 m6">
              <input readonly id="email_vendor" name="email_vendor" type="text" value="<?php echo $vendor->email_vendor; ?>">
              <label for="tanggal_berakhir" class="">Email Vendor</label>
          </div>
          <div class="input-field col s12 m6">
              <input readonly id="nama_pic" name="nama_pic" type="text" value="<?php echo $vendor->nama_pic; ?>">
              <label for="nama_pic" class="">Nama PIC</label>
          </div>
          <div class="col s12 m12">
              <label for="alamat_vendor">Alamat Vendor</label>
              <?php echo $vendor->alamat_vendor; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<input type="button" class="btn red waves-effect waves-green" value="« Kembali" onclick="history.back(-1)" />