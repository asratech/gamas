<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content light-blue lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <form class="row" id="edit-user-form" method="post" action="">
          <?php if(validation_errors()): ?>
            <div class="col s12">
              <div class="card-panel red">
                <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
              </div>
            </div>
          <?php endif; ?>
          <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <div class="input-field col s12 m6">
              <input id="nama_vendor" name="nama_vendor" onkeyup="this.value = this.value.toUpperCase()" type="text" value="<?php echo $vendor->nama_vendor; ?>">
              <label for="nama_vendor" class="">Nama Vendor</label>
          </div>
          <div class="input-field col s12 m6">
              <textarea id="alamat_vendor" name="alamat_vendor" onkeyup="this.value = this.value.toUpperCase()" class="materialize-textarea" value="<?php echo $vendor->alamat_vendor; ?>"></textarea>
              <label for="alamat_vendor" class="">Alamat vendor</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="telepon_vendor" name="telepon_vendor" type="number" value="<?php echo $vendor->telepon_vendor; ?>">
              <label for="telepon_vendor" class="">Telepon Vendor</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="email_vendor" name="email_vendor" type="email" class="validate" value="<?php echo $vendor->email_vendor; ?>">
              <label for="email_vendor" class="">Email Vendor</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="nama_pic" name="nama_pic" onkeyup="this.value = this.value.toUpperCase()" type="text" value="<?php echo $vendor->nama_pic; ?>">
              <label for="nama_pic" class="">Nama PIC</label>
          </div>
          <div class="input-field col s12 right-align">
              <input type="button" class="btn red waves-effect waves-green" value="Batal" onclick="history.back(-1)" />
              <button type="submit" name="submit" value="<?php echo $vendor->id_vendor; ?>" class="btn green waves-effect waves-green">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>