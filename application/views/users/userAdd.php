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
              <select id="wilayah" name="wilayah">
                  <option value="" disabled selected>Pilih Wilayah</option>
                  <option value="Jabodetabek">Jabodetabek</option>
                  <option value="Jawa Timur">Jawa Timur</option>
              </select>
              <label>Wilayah</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="username" name="username" type="text" value="<?php echo set_value('username'); ?>">
              <label for="username" class="">Username</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="email" name="email" type="email" class="validate" value="<?php echo set_value('email'); ?>">
              <label for="email" class="">Alamat Email</label>
          </div>
          <div class="input-field col s12 m6">
              <input id="password" name="password" type="password" value="<?php echo set_value('password'); ?>">
              <label for="password" class="">Password</label>
          </div>
          <div class="input-field col s12 m6">
              <select id="level" name="level">
                  <option value="administrator">Administrator</option>
                  <option value="user">User</option>
              </select>
              <label>Pilih Level</label>
          </div>
          <div class="input-field col s12 m6">
              <select id="active" name="active">
                  <option value="0">Tidak</option>
                  <option value="1">Ya</option>
              </select>
              <label>Active</label>
          </div>
          <div class="input-field col s12 right-align">
              <input type="button" class="btn red waves-effect waves-red" value="Batal" onclick="history.back(-1)" />
              <button type="submit" name="submit" value="add_user" class="btn green waves-effect waves-green">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>