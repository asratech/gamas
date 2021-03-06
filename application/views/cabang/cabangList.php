<script>
$(function(){ TablesDatatables.init(); });
function validate(a)
{
    var id= a.value;

    swal({
            title: "Are you sure?",
            text: "You want to delete this Menu Item!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Delete it!",
            closeOnConfirm: false }, function()
        {
            swal("Deleted!", "Menu Item has been Deleted.", "success");
            $(location).attr('href','<?php echo base_url('cabang/delete/' . $row->id_cabang); ?>');
        }
    );
}
 </script>
<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content light-blue lighten-1 white-text">
          <span class="card-title">Data Master Cabang</span>
          <a href="<?php echo base_url('cabang/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light amber tooltipped" data-position="top" data-tooltip="Tambah Data Cabang"><i class="material-icons">add</i></a>
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
                      <th>Nama Cabang</th>
                      <th>Wilayah</th>
                      <th class="center-align">Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php if($cabang): ?>
                  <?php $no = $this->uri->segment(3); foreach($cabang as $row): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->namacabang; ?></td>
                      <td><?php echo $row->wilayah; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('cabang/edit/' . $row->id_cabang); ?>" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Edit Data Cabang"><i class="material-icons">edit</i></a>
                        <a href="<?php echo base_url('cabang/delete/' . $row->id_cabang); ?>" onclick="return konfirmasiHapus()" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="top" data-tooltip="Delete Data Cabang"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td class="center-align" colspan="7">Belum ada data master cabang</td>
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