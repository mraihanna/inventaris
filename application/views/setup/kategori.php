<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


  <div class="row">
    <div class="col-lg-6">
      <?= form_error('kategori', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKategoriModal">Add New Kategori</a>
      <!-- Hoverable Rows -->
      <table class=" table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kategori</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($kategori as $k) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $k['kategori']; ?></td>
              <td>
                <a href="" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editKategoriModal<?= $k['id']; ?>" class="badge badge-success">Edit</a>
                <a href="<?= base_url('setup/deletekategori/') . $k['id']; ?>" class="badge badge-danger tombol-hapus-kategori">Delete</a>
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
<div class="modal fade" id="newKategoriModal" tabindex="-1" role="dialog" aria-labelledby="newKategoriModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newKategoriModalLabel">Add New Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('setup/kategori'); ?>" method="POST">
        <div class="modal-body">
          <form>
            <div class="form-group">
              <!-- <label for="formGroupExampleInput">Example label</label> -->
              <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori Name">
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


<?php foreach ($kategori as $k) : ?>
  <div class="modal fade" id="editKategoriModal<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editKategoriModalLabel">Edit Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('setup/editkategori/') . $k['id']; ?>" method="POST">
          <div class="modal-body">
            <form>
              <div class="form-group">
                <!-- <label for="formGroupExampleInput">Example label</label> -->
                <input type="text" class="form-control" required id="kategori" name="kategori" value="<?= $k['kategori']; ?>" placeholder="Kategori Name">
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