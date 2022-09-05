<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 text-gray-800"><?= $title; ?></h1>
  <h4 class="text-gray-800 mb-4">KIB B (Kartu Inventaris Barang Peralatan dan Mesin)</h4>


  <div class="row">
    <div class="col-lg-12">
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
              <th scope="col">Action</th>
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
                <td>
                  <a href="" class="badge badge-warning" title="EDIT" data-toggle="modal" data-target="#editKibB<?= $a['id']; ?>">Edit</a>
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

  <h4 class="text-gray-800 my-4">KIB C (Kartu Inventaris Barang Bangunan)</h4>


  <div class="row">
    <div class="col-lg-12">
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