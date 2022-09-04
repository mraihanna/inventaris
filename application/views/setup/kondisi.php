<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


  <div class="row">
    <div class="col-lg-6">
      <?= form_error('kondisi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKondisiModal">Add New Kondisi</a>
      <!-- Hoverable Rows -->
      <table class=" table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kondisi</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($kondisi as $k) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $k['kondisi']; ?></td>
              <td>
                <a href="" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editKondisiModal<?= $k['id']; ?>" class="badge badge-success">Edit</a>
                <a href="<?= base_url('setup/deletekondisi/') . $k['id']; ?>" class="badge badge-danger tombol-hapus-kondisi">Delete</a>
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
<div class="modal fade" id="newKondisiModal" tabindex="-1" role="dialog" aria-labelledby="newKondisiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newKondisiModalLabel">Add New Kondisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('setup/kondisi'); ?>" method="POST">
        <div class="modal-body">
          <form>
            <div class="form-group">
              <!-- <label for="formGroupExampleInput">Example label</label> -->
              <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="Kondisi Name">
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


<?php foreach ($kondisi as $k) : ?>
  <div class="modal fade" id="editKondisiModal<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editKondisiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editKondisiModalLabel">Edit Kondisi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('setup/editkondisi/') . $k['id']; ?>" method="POST">
          <div class="modal-body">
            <form>
              <div class="form-group">
                <!-- <label for="formGroupExampleInput">Example label</label> -->
                <input type="text" class="form-control" required id="kondisi" name="kondisi" value="<?= $k['kondisi']; ?>" placeholder="Menu Name">
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