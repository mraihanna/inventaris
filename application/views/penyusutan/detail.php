<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <?php if ($kib['aset'] == "B") : ?>
    <h4 class="mb-2 text-gray-900">KIB B</h4>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group row">
          <label for="email" class="col-sm-3 col-form-label">Nomor Penyusutan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nompeny" name="nompeny" value="<?= $kib['nomor_aset']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Nama Barang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['nama_aset']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Merk</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['merk']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Kondisi</label>
          <div class="col-sm-9">
            <?php $kondisi = $this->db->get_where('kondisi', ['id' => $kib['id_kondisi']])->row_array(); ?>
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kondisi['kondisi']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Kategori</label>
          <div class="col-sm-9">
            <?php $kategori = $this->db->get_where('kategori', ['id' => $kib['id_kategori']])->row_array(); ?>
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kategori['kategori']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Ruangan</label>
          <div class="col-sm-9">
            <?php $ruangan = $this->db->get_where('ruangan', ['id' => $kib['id_ruangan']])->row_array(); ?>
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $ruangan['ruangan']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Sumber Barang</label>
          <div class="col-sm-9">
            <?php $sumber_barang = $this->db->get_where('sumber_barang', ['id' => $kib['id_sumber_barang']])->row_array(); ?>
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $sumber_barang['sumber_barang']; ?> (<?= $kib['kode_sumber_barang']; ?>)">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Bahan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['bahan']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Tanggal Pengadaan</label>
          <div class="col-sm-9">
            <?php $tgl = strtotime($kib['tanggal_pengadaan']); ?>
            <?php $tanggal = date("d F Y", $tgl); ?>
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $tanggal; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Umur Ekonomis</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['umur_ekonomis']; ?> Tahun">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Harga</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="Rp. <?= number_format($kib['harga']); ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Status Barang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['status_barang']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Penyusutan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['penyusutan']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Umur Pemakaian</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['pemakaian']; ?> Tahun">
          </div>
        </div>
        <h3>Detail Penyusutan Aset</h3>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <td>Akhir Tahun Ke</td>
                <td>Tahun</td>
                <td>Harga Perolehan</td>
                <td>Penyusutan</td>
                <td>Akumulasi Penyusutan</td>
                <td>Nilai Akhir Aset</td>
              </tr>
            </thead>
            <tbody>
              <tr align="center">
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td align="right">Rp. <?= number_format($kib['harga']); ?></td>
              </tr>
              <?php $no = 1; ?>
              <?php for ($i = 0; $i < $kib['pemakaian']; $i++) : ?>
                <?php
                $tgl1       = $kib['tanggal_pengadaan'];
                $tgl2       = date('Y', strtotime('+' . $i . ' year', strtotime($tgl1)));
                $akum[$i]   = $kib['penyusutan'];
                $akhir_aset = $kib['harga'] - ($kib['penyusutan'] * $i);
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $tgl2; ?></td>
                  <td align="right">Rp. <?= number_format($kib['harga']); ?></td>
                  <td align="right">Rp. <?= number_format($kib['penyusutan']); ?></td>
                  <td align="right">Rp. <?= number_format(array_sum($akum)); ?></td>
                  <td align="right">Rp. <?= number_format($akhir_aset); ?></td>
                </tr>
              <?php endfor; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php else : ?>
    <h4 class="mb-2 text-gray-900">KIB C</h4>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group row">
          <label for="email" class="col-sm-3 col-form-label">Nomor Penyusutan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nompeny" name="nompeny" value="<?= $kib['nomor_aset']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Nama Barang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['nama_aset']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Luas</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['luas']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Kondisi</label>
          <div class="col-sm-9">
            <?php $kondisi = $this->db->get_where('kondisi', ['id' => $kib['id_kondisi']])->row_array(); ?>
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kondisi['kondisi']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Lokasi</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['lokasi']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Tahun</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['tahun']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Harga</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="Rp. <?= number_format($kib['harga']); ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Umur Ekonomis</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['umur_ekonomis']; ?> Tahun">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Status Barang</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['status_barang']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Penyusutan</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['penyusutan']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Umur Pemakaian</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" readonly id="name" name="name" value="<?= $kib['pemakaian']; ?>">
          </div>
        </div>
        <h3>Detail Penyusutan Aset</h3>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <td>Akhir Tahun Ke</td>
                <td>Tahun</td>
                <td>Harga Perolehan</td>
                <td>Penyusutan</td>
                <td>Akumulasi Penyusutan</td>
                <td>Nilai Akhir Aset</td>
              </tr>
            </thead>
            <tbody>
              <tr align="center">
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td align="right">Rp. <?= number_format($kib['harga']); ?></td>
              </tr>
              <?php $no = 1; ?>
              <?php for ($i = 0; $i < $kib['pemakaian']; $i++) : ?>
                <?php
                $tgl1       = "01-01-" . $kib['tahun'];
                $tgl2       = date('Y', strtotime('+' . $i . ' year', strtotime($tgl1)));
                $akum[$i]   = $kib['penyusutan'];
                $akhir_aset = $kib['harga'] - ($kib['penyusutan'] * $i);
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $tgl2; ?></td>
                  <td align="right">Rp. <?= number_format($kib['harga']); ?></td>
                  <td align="right">Rp. <?= number_format($kib['penyusutan']); ?></td>
                  <td align="right">Rp. <?= number_format(array_sum($akum)); ?></td>
                  <td align="right">Rp. <?= number_format($akhir_aset); ?></td>
                </tr>
              <?php endfor; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
</div>