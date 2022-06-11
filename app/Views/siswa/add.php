<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('siswa') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah siswa Baru</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Induk / Tambah siswa</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('siswa/tambah'); ?>" autocomplete="off" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">NIS</label>
                            <input type="number" class="form-control  <?= ($validation->hasError('nis')) ? 'is-invalid' : ' '; ?>" name="nis">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nis'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">NISN</label>
                            <input type="number" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ' '; ?>" name="nisn">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nisn'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_siswa')) ? 'is-invalid' : ' '; ?>" name="nama_siswa">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_siswa'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option>Jenis Kelamin</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ' '; ?>"" name=" tanggal_lahir">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_lahir'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Agama</label>
                        <select class="form-control" name="agama">
                            <option>Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">No Telepon</label>
                            <input type="number" class="form-control" name="no_telp">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Pendidikan Sebelumnya</label>
                            <input type="text" class="form-control" name="pendidikan_sebelumnya">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Nomer Telepon Orang Tua</label>
                            <input type="number" class="form-control" name="ortu_notelp">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Tingkat Pendidikan Ayah</label>
                            <input type="text" class="form-control" name="tingkat_pendidikan_ayah">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Tingkat Pendidikan Ibu</label>
                            <input type="text" class="form-control" name="tingkat_pendidikan_ibu">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" name="pekerjaan_ayah">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" name="pekerjaan_ibu">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Orang Tua</label>
                        <input type="text" class="form-control" name="alamat_ortu">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Wali</label>
                        <input type="text" class="form-control" name="nama_wali">
                    </div>
                    <div class="form-group">
                        <label for="">Wali Alamat</label>
                        <input type="text" class="form-control" name="wali_alamat">
                    </div>
                    <div class="form-group">
                        <label for="">No Telepon Wali</label>
                        <input type="text" class="form-control" name="notelp_wali">
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan Wali</label>
                        <input type="text" class="form-control" name="wali_pkj">
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ' '; ?>" id="foto" name="foto">
                            <label class="custom-file-label" for="foto">Pilih Foto</label>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('foto'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Tambah Data</button>
                </form>
            </div>
        </div>
    </div><!-- .animated -->
    <?= $this->endSection() ?>
    <script src="assets/js/init-scripts/data-table/datatables-ini.js"></script>