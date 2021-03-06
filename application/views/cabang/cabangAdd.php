<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content light-blue lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
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
              <input id="namacabang" name="namacabang" style="text-transform:uppercase" type="text" value="<?php echo set_value('namacabang'); ?>">
              <label for="namacabang" class="">Nama Cabang</label>
          </div>
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
          </div>
          <div class="input-field col s12 right-align">
              <input type="button" class="btn red waves-effect waves-red" value="Batal" onclick="history.back(-1)" />
              <button type="submit" name="submit" value="add_cabang" class="btn green waves-effect waves-green">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>