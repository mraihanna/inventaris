<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 text-gray-800"><?= $title; ?></h1>
  <h4 class="text-gray-800 mb-4">Kartu Inventaris Barang Bangunan</h4>


  <div class="row">
    <div class="col-lg-12">
      <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
          <?= validation_errors(); ?>
        </div>
      <?php endif; ?>
      <!-- yang atas diguynakan kalau error nya banyak form validationnya banayak -->
      <?= $this->session->flashdata('message'); ?>
      <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKibC">Add new KIB C</a>
      <!-- Hoverable Rows -->
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nomor Aset</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Kondisi</th>
              <th scope="col">Luas (m <sup>2</sup>)</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Tahun</th>
              <th scope="col">Umur Ekonomis</th>
              <th scope="col">Harga</th>
              <th scope="col">Status Barang</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kib_c as $a) : ?>
              <?php $kondisiById = $this->db->get_where('kondisi', ['id' => $a['id_kondisi']])->row_array(); ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $a['nomor_aset']; ?></td>
                <td><?= $a['nama_barang']; ?></td>
                <td><?= $kondisiById['kondisi']; ?></td>
                <td><?= $a['luas']; ?></td>
                <td><?= $a['lokasi']; ?></td>
                <td><?= $a['tahun']; ?></td>
                <td><?= $a['umur_ekonomis']; ?></td>
                <td>Rp. <?= number_format($a['harga']); ?></td>
                <?php if ($a['id_kondisi'] == 1) : ?>
                  <td class="text-danger"><?= $a['status_barang']; ?></td>
                <?php elseif ($a['id_kondisi'] == 2) : ?>
                  <td class="text-warning"><?= $a['status_barang']; ?></td>
                <?php else : ?>
                  <td><?= $a['status_barang']; ?></td>
                <?php endif; ?>
                <td>
                  <a href="" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editKibC<?= $a['id']; ?>">Edit</a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- End HOverable table -->
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newKibC" tabindex="-1" role="dialog" aria-labelledby="newKibCLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newKibCLabel">Add New KIB C</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('aset/kib_c'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nomor_aset">Nomor Aset</label>
            <input type="text" class="form-control" id="nomor_aset" name="nomor_aset" readonly placeholder="[Nomor Aset Automatic]">
          </div>
          <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
          </div>
          <div class="form-group">
            <label for="nomor_aset">Kondisi</label>
            <select class="form-control" name="kondisi" id="kondisi">
              <option value="">Pilih Kondisi</option>
              <?php foreach ($kondisi as $k) : ?>
                <option value="<?= $k['id']; ?>"><?= $k['kondisi']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <label for="luas">Luas</label>
          <div class="row">
            <div class="form-group col-md-10">
              <input type="text" class="form-control" id="luas" name="luas" placeholder="Luas">
            </div>
            <div class="form-group col-md-2">
              <label for="luas" class="my-auto">m<sup>2</sup></label>
            </div>
          </div>
          <div class="form-group">
            <label for="nomor_aset">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi">
          </div>
          <div class="form-group">
            <label for="nomor_aset">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
          </div>
          <div class="form-group">
            <label for="nomor_aset">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
          </div>
          <div class="form-group">
            <label for="nomor_aset">Umur Ekonomis</label>
            <input type="text" class="form-control" id="umur_ekonomis" name="umur_ekonomis" placeholder="Umur Ekonomis">
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

<?php foreach ($kib_c as $a) : ?>
  <div class="modal fade" id="editKibC<?= $a['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editKibCLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editKibCLabel">Edit KIB C</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('aset/editKib_c/') . $a['id']; ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="nomor_aset">Nomor Aset</label>
              <input type="text" class="form-control" required id="nomor_aset" name="nomor_aset" readonly value="<?= $a['nomor_aset']; ?>">
            </div>
            <div class="form-group">
              <label for="nomor_aset">Nama Barang</label>
              <input type="text" class="form-control" readonly id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="<?= $a['nama_barang']; ?>">
            </div>
            <div class="form-group">
              <label for="nomor_aset">Kondisi</label>
              <select class="form-control" name="kondisi" id="kondisi">
                <?php foreach ($kondisi as $k) : ?>
                  <option value="<?= $k['id']; ?>" <?= ($k['id'] == $a['id_kondisi']) ? "selected" : ""; ?>><?= $k['kondisi']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <label for="luas">Luas</label>
            <div class="row">
              <div class="form-group col-md-10">
                <input type="text" class="form-control" id="luas" name="luas" value="<?= $a['luas']; ?>" placeholder="Luas">
              </div>
              <div class="form-group col-md-2">
                <label for="luas" class="my-auto">m<sup>2</sup></label>
              </div>
            </div>
            <div class="form-group">
              <label for="nomor_aset">Tahun</label>
              <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="<?= $a['tahun']; ?>">
            </div>
            <div class="form-group">
              <label for="nomor_aset">Harga</label>
              <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?= $a['harga']; ?>">
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