<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content light-blue lighten-1 white-text">
          <span class="card-title">  Data Master perizinan</span>
          <a href="<?php echo base_url('perizinan/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light amber tooltipped" data-position="top" data-tooltip="Tambah Data"><i class="material-icons">add</i></a>
          <!-- <a href="<?php echo base_url('perizinan/laporanvendor'); ?>" class="btn-floating right halfway-fab waves-effect waves-light green tooltipped" data-position="top" data-tooltip="Print Data Master"> <i class="material-icons">print</i></a> -->
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
                      <th>Wilayah</th>
                      <th>Kode perizinan</th>
                      <th>Nama perizinan</th>
                      <th class="center-align">Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php if($perizinan): ?>
                  <?php $no = $this->uri->segment(3); foreach($perizinan as $row): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->wilayah; ?></td>
                      <td><?php echo $row->kode_izin; ?></td>
                      <td><?php echo $row->jenis_perizinan; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('perizinan/edit/' . $row->kode_izin); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Edit Data"><i class="material-icons">edit</i></a>
                        <a href="<?php echo base_url('perizinan/delete/' . $row->kode_izin); ?>" onclick="return konfirmasiHapus()" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Delete Data"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td class="center-align" colspan="7">Belum ada data master perizinan</td>
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