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
              <th scope="col">Tahun</th>
              <th scope="col">Harga</th>
              <th scope="col">Umur Ekonomis</th>
              <th scope="col">Umur Pemakaian</th>
              <th scope="col">Nilai Residu</th>
              <th scope="col">Penyusutan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kib_b as $a) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $a['nomor_aset']; ?></td>
                <td><?= $a['nama_aset']; ?></td>
                <td><?= $a['tahun']; ?></td>
                <td>Rp. <?= number_format($a['harga']); ?></td>
                <td><?= $a['umur_ekonomis']; ?></td>
                <td><?= $a['pemakaian']; ?></td>
                <td>Rp. <?= number_format($a['residu']); ?></td>
                <td>Rp. <?= number_format($a['penyusutan']); ?></td>
                <td>
                  <a href="<?= base_url('penyusutan/detail/') . $a['id']; ?>" class="badge badge-warning" title="Detail">Detail</a>
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
        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nomor Aset</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Tahun</th>
              <th scope="col">Harga</th>
              <th scope="col">Umur Ekonomis</th>
              <th scope="col">Umur Pemakaian</th>
              <th scope="col">Nilai Residu</th>
              <th scope="col">Penyusutan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($kib_c as $a) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $a['nomor_aset']; ?></td>
                <td><?= $a['nama_aset']; ?></td>
                <td><?= $a['tahun']; ?></td>
                <td>Rp. <?= number_format($a['harga']); ?></td>
                <td><?= $a['umur_ekonomis']; ?></td>
                <td><?= $a['pemakaian']; ?></td>
                <td>Rp. <?= number_format($a['residu']); ?></td>
                <td>Rp. <?= number_format($a['penyusutan']); ?></td>
                <td>
                  <a href="<?= base_url('penyusutan/detail/') . $a['id']; ?>" class="badge badge-warning" title="Detail">Detail</a>
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