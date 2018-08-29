<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content light-blue lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?> - Kode Izin : </span>
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
              <input id="jenis_perizinan" name="jenis_perizinan" onkeyup="this.value = this.value.toUpperCase()" type="text" value="<?php echo $perizinan->jenis_perizinan; ?>">
              <label for="jenis_perizinan" class="">Jenis Perizinan</label>
          </div>
          <div class="input-field col s12 right-align">
              <input type="button" class="btn red waves-effect waves-green" value="Batal" onclick="history.back(-1)" />
              <button type="submit" name="submit" value="<?php echo $perizinan->kode_izin; ?>" class="btn green waves-effect waves-green">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>