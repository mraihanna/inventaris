<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


  <div class="row">
    <div class="col-lg-6">
      <?= form_error('sumber_barang', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSumberBarangModal">Add New Sumber Barang</a>
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
          <?php foreach ($sumber_barang as $k) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $k['sumber_barang']; ?></td>
              <td>
                <a href="" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editSumberBarangModal<?= $k['id']; ?>" class="badge badge-success">Edit</a>
                <a href="<?= base_url('setup/deletesumberbarang/') . $k['id']; ?>" class="badge badge-danger tombol-hapus-sumber-barang">Delete</a>
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
<div class="modal fade" id="newSumberBarangModal" tabindex="-1" role="dialog" aria-labelledby="newSumberBarangModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSumberBarangModalLabel">Add New Sumber Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('setup/sumber_barang'); ?>" method="POST">
        <div class="modal-body">
          <form>
            <div class="form-group">
              <!-- <label for="formGroupExampleInput">Example label</label> -->
              <input type="text" class="form-control" id="sumber_barang" name="sumber_barang" placeholder="Sumber Barang Name">
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


<?php foreach ($sumber_barang as $k) : ?>
  <div class="modal fade" id="editSumberBarangModal<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSumberBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSumberBarangModalLabel">Edit Ruangan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('setup/editsumberbarang/') . $k['id']; ?>" method="POST">
          <div class="modal-body">
            <form>
              <div class="form-group">
                <!-- <label for="formGroupExampleInput">Example label</label> -->
                <input type="text" class="form-control" required id="sumber_barang" name="sumber_barang" value="<?= $k['sumber_barang']; ?>" placeholder="Ruangan Name">
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