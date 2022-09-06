<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 text-gray-800"><?= $title; ?></h1>
  <h4 class="text-gray-800 mb-4">Kartu Inventaris Barang Peralatan dan Mesin</h4>


  <div class="row">
    <div class="col-lg-12">
      <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
          <?= validation_errors(); ?>
        </div>
      <?php endif; ?>
      <!-- yang atas diguynakan kalau error nya banyak form validationnya banayak -->
      <?= $this->session->flashdata('message'); ?>
      <?php if ($user['role_id'] == 1) : ?>
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKibB">Add new KIB B</a>
      <?php endif; ?>
      <!-- Hoverable Rows -->
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nomor Aset</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Type/Merk</th>
              <th scope="col">Bahan</th>
              <th scope="col">Kondisi</th>
              <th scope="col">Kategori</th>
              <th scope="col">Ruangan</th>
              <th scope="col">Tanggal Pengadaan</th>
              <th scope="col">Tahun</th>
              <th scope="col">Umur Ekonomis</th>
              <th scope="col">Harga</th>
              <th scope="col">Sumber Barang</th>
              <th scope="col">Kode Sumber Barang</th>
              <th scope="col">Status Barang</th>
              <?php if ($user['role_id'] == 1) : ?>
                <th scope="col">Action</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kib_b as $a) : ?>
              <?php $kondisiById = $this->db->get_where('kondisi', ['id' => $a['id_kondisi']])->row_array(); ?>
              <?php $kategoriById = $this->db->get_where('kategori', ['id' => $a['id_kategori']])->row_array(); ?>
              <?php $ruanganById = $this->db->get_where('ruangan', ['id' => $a['id_ruangan']])->row_array(); ?>
              <?php $sumber_barangById = $this->db->get_where('sumber_barang', ['id' => $a['id_sumber_barang']])->row_array(); ?>
              <?php $tgl = strtotime($a['tanggal_pengadaan']); ?>
              <?php $tanggal = date("d F Y", $tgl); ?>

              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $a['nomor_aset']; ?></td>
                <td><?= $a['nama_barang']; ?></td>
                <td><?= $a['merk']; ?></td>
                <td><?= $a['bahan']; ?></td>
                <td><?= $kondisiById['kondisi']; ?></td>
                <td><?= $kategoriById['kategori']; ?></td>
                <td><?= $ruanganById['ruangan']; ?></td>
                <td><?= $tanggal; ?></td>
                <td><?= $a['tahun']; ?></td>
                <td><?= $a['umur_ekonomis']; ?></td>
                <td>Rp. <?= number_format($a['harga']); ?></td>
                <td><?= $sumber_barangById['sumber_barang']; ?></td>
                <td><?= $a['kode_sumber_barang']; ?></td>
                <?php if ($a['id_kondisi'] == 1) : ?>
                  <td class="text-danger"><?= $a['status_barang']; ?></td>
                <?php elseif ($a['id_kondisi'] == 2) : ?>
                  <td class="text-warning"><?= $a['status_barang']; ?></td>
                <?php else : ?>
                  <td><?= $a['status_barang']; ?></td>
                <?php endif; ?>
                <?php if ($user['role_id'] == 1) : ?>
                  <td>
                    <a href="" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editKibB<?= $a['id']; ?>">Edit</a>
                  </td>
                <?php endif; ?>
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
<div class="modal fade" id="newKibB" tabindex="-1" role="dialog" aria-labelledby="newKibALabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newKibBLabel">Add New KIB B</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('aset/kib_b'); ?>" method="POST">
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
            <label for="nomor_aset">Type/Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk">
          </div>
          <div class="form-group">
            <label for="nomor_aset">Bahan</label>
            <input type="text" class="form-control" id="bahan" name="bahan" placeholder="bahan">
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
          <div class="form-group">
            <label for="nomor_aset">Kategori</label>
            <select class="form-control" name="kategori" id="kategori">
              <option value="">Pilih Kategori</option>
              <?php foreach ($kategori as $k) : ?>
                <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nomor_aset">Ruangan</label>
            <select class="form-control" name="ruangan" id="ruangan">
              <option value="">Pilih Ruangan</option>
              <?php foreach ($ruangan as $k) : ?>
                <option value="<?= $k['id']; ?>"><?= $k['ruangan']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nomor_aset">Tanggal Pengadaan</label>
            <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal Pengadaan">
          </div>
          <div class="form-group">
            <label for="nomor_aset">Umur Ekonomis</label>
            <input type="text" class="form-control" id="umur_ekonomis" name="umur_ekonomis" placeholder="Umur Ekonomis">
          </div>
          <div class="form-group">
            <label for="nomor_aset">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
          </div>
          <div class="form-group">
            <label for="nomor_aset">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
          </div>
          <div class="form-group">
            <label for="nomor_aset">Sumber Barang</label>
            <select class="form-control" name="semua_barang" id="semua_barang">
              <option value="">Pilih Sumber Barang</option>
              <?php foreach ($sumber_barang as $k) : ?>
                <option value="<?= $k['id']; ?>"><?= $k['sumber_barang']; ?></option>
              <?php endforeach; ?>
            </select>
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

<?php foreach ($kib_b as $a) : ?>
  <div class="modal fade" id="editKibB<?= $a['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editKibBLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editKibBLabel">Edit KIB B</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('aset/editKib_b/') . $a['id']; ?>" method="POST">
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
            <div class="form-group">
              <label for="nomor_aset">Ruangan</label>
              <select class="form-control" name="ruangan" id="ruangan">
                <?php foreach ($ruangan as $k) : ?>
                  <option value="<?= $k['id']; ?>" <?= ($k['id'] == $a['id_ruangan']) ? "selected" : ""; ?>><?= $k['ruangan']; ?></option>
                <?php endforeach; ?>
              </select>
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