<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


  <div class="row">
    <div class="col-lg-6">
      <?= form_error('ruangan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRuanganModal">Add New Ruangan</a>
      <!-- Hoverable Rows -->
      <table class=" table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ruangan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($ruangan as $k) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $k['ruangan']; ?></td>
              <td>
                <a href="" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editRuanganModal<?= $k['id']; ?>" class="badge badge-success">Edit</a>
                <a href="<?= base_url('setup/deleteruangan/') . $k['id']; ?>" class="badge badge-danger tombol-hapus-ruangan">Delete</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
      <!-- End HOverable table -->
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="newRuanganModal" tabindex="-1" role="dialog" aria-labelledby="newRuanganModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRuanganModalLabel">Add New Ruangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('setup/ruangan'); ?>" method="POST">
        <div class="modal-body">
          <form>
            <div class="form-group">
              <!-- <label for="formGroupExampleInput">Example label</label> -->
              <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="Ruangan Name">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php foreach ($ruangan as $k) : ?>
  <div class="modal fade" id="editRuanganModal<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRuanganModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editRuanganModalLabel">Edit Ruangan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('setup/editruangan/') . $k['id']; ?>" method="POST">
          <div class="modal-body">
            <form>
              <div class="form-group">
                <!-- <label for="formGroupExampleInput">Example label</label> -->
                <input type="text" class="form-control" required id="ruangan" name="ruangan" value="<?= $k['ruangan']; ?>" placeholder="Ruangan Name">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>