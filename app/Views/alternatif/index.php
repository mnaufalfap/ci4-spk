<?= $this->extend('template/content'); ?>

<?php $this->section('content'); ?>

<div class="section">
  <div class="row">
    <div class="col-md-12">

      <h1 class="text-gray-900"><?= $judul; ?></h1>

      <?php if (session('role') === 'Admin') : ?>
        <div class="alert alert-primary mt-3" role="alert">
          <strong>
            Pastikan telah memasukkan semua data kriteria dan sub kriteria, hal ini juga akan digunakan pada form tambah data alternatif.
          </strong>
        </div>
      <?php endif; ?>

      <div class="row mt-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header">
              <button class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#modalBoxTambah" data-backdrop="static" data-keyboard="false"><i class="fas fa fa-plus"></i> Tambah</button>
              <button class="btn btn-danger btn-hapus"><i class="fas fa fa-trash-alt"></i> Hapus</button>
              <button class="btn btn-success btn-ubah"><i class="fas fa fa-edit"></i> Ubah</button>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-alternatif" id="dataTable">
                <thead>
                  <th>
                    <input type="checkbox" id="checkboxes">
                  </th>
                  <th>No.</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Detail</th>
                </thead>
                <tbody>
                  <?php foreach ($alternatif as $key => $row) : ?>
                    <tr>
                      <td>
                        <input type="checkbox" name="id[]" class="checkbox" value="<?= $row['id_alternatif']; ?>">
                      </td>
                      <td><?= $key + 1; ?></td>
                      <td><?= $row['kode']; ?></td>
                      <td><?= $row['nama']; ?></td>
                      <td>
                        <button type="button" class="btn btn-info btn-detail" data-id="<?= $row['id_alternatif']; ?>"><i class=" fas fa-eye"></i></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalBoxTambah" tabindex="-1" role="dialog" aria-labelledby="modalBoxTambahTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header badge-primary">
              <h5 class="modal-title">Tambah <?= $judul; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="/alternatif/create" method="POST" class="formSubmit" id="formTambah">
              <div class="modal-body">
                <?= csrf_field(); ?>

                <div class="row">
                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="kode">Kode</label>
                      <input type="text" name="kode" id="kode" class="form-control" placeholder="misal. A1..">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Lansia</label>
                      <input type="text" name="nama" id="nama" class="form-control" placeholder="masukkan nama">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kondisi_keluarga">Kondisi Keluarga</label>
                      <select name="kondisi_keluarga" id="kondisi_keluarga" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($kondisi_keluarga as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="tempat_tinggal">Tempat Tinggal</label>
                      <select name="tempat_tinggal" id="tempat_tinggal" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($tempat_tinggal as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="usia_lansia">Usia Lansia</label>
                      <select name="usia_lansia" id="usia_lansia" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($usia_lansia as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kesehatan">Kesehatan</label>
                      <select name="kesehatan" id="kesehatan" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($kesehatan as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="makanan">Makanan Sehari-hari</label>
                      <select name="makanan" id="makanan" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($makanan as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="makanan_protein">Makanan Berprotein</label>
                      <select name="makanan_protein" id="makanan_protein" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($makanan_protein as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="pakaian">Pakaian</label>
                      <select name="pakaian" id="pakaian" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($pakaian as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="sekolah">Sekolah</label>
                      <select name="sekolah" id="sekolah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($makanan as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-simpan"><i class="fas fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal Ubah -->
      <div class="modal fade" id="modalBoxUbah" tabindex="-1" role="dialog" aria-labelledby="modalBoxUbahTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header badge-primary">
              <h5 class="modal-title">Ubah <?= $judul; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="/alternatif/update" method="POST" class="formSubmit" id="formUbah">
              <div class="modal-body">
                <?= csrf_field(); ?>

                <input type="hidden" name="id_alternatif">

                <div class="row">
                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="kode_ubah">Kode</label>
                      <input type="text" name="kode" id="kode_ubah" class="form-control" placeholder="misal. A1..">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="nama_ubah">Nama Lansia</label>
                      <input type="text" name="nama" id="nama_ubah" class="form-control" placeholder="masukkan nama">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kondisi_keluarga">Kondisi Keluarga</label>
                      <select name="kondisi_keluarga" id="kondisi_keluarga_ubah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($kondisi_keluarga as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="tempat_tinggal">Tempat Tinggal</label>
                      <select name="tempat_tinggal" id="tempat_tinggal_ubah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($tempat_tinggal as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="usia_lansia">Usia Lansia</label>
                      <select name="usia_lansia" id="usia_lansia_ubah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($usia_lansia as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kesehatan">Kesehatan</label>
                      <select name="kesehatan" id="kesehatan_ubah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($kesehatan as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="makanan">Makanan Sehari-hari</label>
                      <select name="makanan" id="makanan_ubah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($makanan as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="makanan_protein">Makanan Berprotein</label>
                      <select name="makanan_protein" id="makanan_protein_ubah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($makanan_protein as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="pakaian">Pakaian</label>
                      <select name="pakaian" id="pakaian_ubah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($pakaian as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="sekolah">Sekolah</label>
                      <select name="sekolah" id="sekolah_ubah" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($sekolah as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-simpan"><i class="fas fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal Detail -->
      <div class="modal fade" id="modalBoxDetail" tabindex="-1" role="dialog" aria-labelledby="modalBoxDetailTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header badge-primary">
              <h5 class="modal-title">Detail <?= $judul; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <div class="card shadow card-detail">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Kode Alternatif</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 kode"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Nama Lansia</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 nama"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Kode Alternatif</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 kode"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Nama Lansia</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 nama"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Kode Alternatif</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 kode"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Nama Lansia</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 nama"></div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php $this->endSection(); ?>

<?php $this->section('custom-js') ?>
<script>
  $(document).ready(function() {

    const formTambah = $('#formTambah')
    formTambah.submit(function(e) {
      e.preventDefault()

      requestSaveData(formTambah, '#modalBoxTambah')

      removeClasses('#formTambah')
    })

    $('.btn-hapus').on('click', function() {
      requestDeleteData('/alternatif/delete')
    })

    $('.btn-ubah').on('click', function(e) {
      requestGetDataById('/alternatif/getDataById')
    })

    const formUbah = $('#formUbah')
    formUbah.submit(function(e) {
      e.preventDefault()

      requestSaveData(formUbah, '#modalBoxUbah')

      removeClasses('#formUbah')
    })

    $(document).on('click', '.btn-detail', function() {
      let id = $(this).data('id')
      requestGetDataById('/alternatif/getDataById', '', id)
    })
  })

  $(document).on('click', '.btn-detail', function() {
    let id = $(this).data('id')
    requestGetDataById('/alternatif/getDataById', '', id)
  })
</script>
<?= $this->endSection(); ?>