<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content light-blue lighten-1 white-text">
          <span class="card-title">Data Master Vendor</span>
          <a href="<?php echo base_url('vendor/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light amber tooltipped" data-position="top" data-tooltip="Tambah Data"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <table id="data-table" class="mdl-data-table" style="width:100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Vendor</th>
                      <th>Telepon</th>
                      <th class="center-align">Email</th>
                      <th>Nama PIC</th>
                      <th class="center-align">Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php if($vendor): ?>
                  <?php $no = $this->uri->segment(3); foreach($vendor as $row): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->nama_vendor; ?></td>
                      <td><?php echo $row->telepon_vendor; ?></td>
                      <td class="center-align"><?php echo $row->email_vendor; ?></td>
                      <td><?php echo $row->nama_pic; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('vendor/detail/' . $row->id_vendor); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Detail"><i class="material-icons">list</i></a>
                        <a href="<?php echo base_url('vendor/edit/' . $row->id_vendor); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Edit Data"><i class="material-icons">edit</i></a>
                        <a href="<?php echo base_url('vendor/delete/' . $row->id_vendor); ?>" onclick="return konfirmasiHapus()" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Delete Data"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td class="center-align" colspan="7">Belum ada data lowongan kerja</td>
                  </tr>
                <?php endif; ?>
              </tbody>
          </table>
          <div class="center-align">
            <?php echo $this->pagination->create_links(); ?>
          </div>
        </div>
      </div>
    </div>
</div>