<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content light-blue lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?> - Doc.No : M.IZIN-XXXX </span>
      </div>
      <div class="card-content">
        <form class="row" id="add-user-form" method="post" action="">
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
            <select name="wilayah" id="wilayah"> 
                <option value="">- Pilih Wilayah -</option>                               
                  <?php
                   if (!empty($wilayah)) {
                    foreach ($wilayah as $row) {
                        echo "<option value='".$row->nama_wilayah."'>".strtoupper($row->nama_wilayah)."</option>";                                        
                    }
                   }
                  ?>
              </select> 
              <label>Wilayah</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="jenis_perizinan" name="jenis_perizinan" onkeyup="this.value = this.value.toUpperCase()" type="text" value="<?php echo set_value('jenis_perizinan'); ?>">
              <label for="jenis_perizinan" class="">Jenis Perizinan</label>
          </div>
          <div class="input-field col s12 m6 right-align">
              <input type="button" class="btn red waves-effect waves-green" value="Kembali" onclick="history.back(-1)" />
              <button type="submit" name="submit" value="add_perizinan" class="btn green waves-effect waves-green">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>