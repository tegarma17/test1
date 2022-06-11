<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('siswa') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Lihat Data siswa <?= $siswa['nama_siswa'] ?> </h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Induk / Data Siswa</h4>
            </div>
            <div class="card-body">
                <div class="col-md-3 ">
                    <img src="/img/<?= $siswa['foto'] ?>" alt="">
                </div>
                <form method="post" action="<?= base_url('siswa/ubah/' . $siswa['id_siswa']) ?>">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">NIS</label>
                            <input type="number" class="form-control  <?= ($validation->hasError('nis')) ? 'is-invalid' : ' '; ?>" name="nis" value="<?= $siswa['nis'] ?>" readonly>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nis'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">NISN</label>
                            <input type="number" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ' '; ?>" value="<?= $siswa['nisn'] ?>" name="nisn" readonly>
                            <div class="invalid-feedback">
                                <?= $validation->getError('nisn'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option>Jenis Kelamin</option>
                            <?php $jk = $siswa['jk'] ?>
                            <option <?= ($jk == 'Laki - Laki') ? 'selected="selected"' : '' ?>>Laki - Laki</option>
                            <option <?= ($jk == 'Perempuan') ? 'selected="selected"' : '' ?>>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tmpt_lahir" value="<?= $siswa['tmpt_lahir'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" value="<?= $siswa['tgl_lahir'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Agama</label>
                        <select class="form-control" name="agama">
                            <option>Agama</option>
                            <?php $agama = $siswa['agama'] ?>
                            <option <?= ($agama == 'Islam') ? 'selected="selected"' : '' ?>>Islam</option>
                            <option <?= ($agama == 'Kristen') ? 'selected="selected"' : '' ?>>Kristen</option>
                            <option <?= ($agama == 'Katolik') ? 'selected="selected"' : '' ?>>Katolik</option>
                            <option <?= ($agama == 'Hindu') ? 'selected="selected"' : '' ?>>Hindu</option>
                            <option <?= ($agama == 'Budha') ? 'selected="selected"' : '' ?>>Budha</option>
                            <option <?= ($agama == 'Konghucu') ? 'selected="selected"' : '' ?>>Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $siswa['alamat'] ?>">
                    </div>
                    <div class=" form-row">
                        <div class=" form-group col-md-6">
                            <label for="">Pendidikan Sebelumnya</label>
                            <input type="text" class="form-control" name="pendidikan_sebelumnya" value="<?= $siswa['pendidikan_sebelumnya'] ?>">
                        </div>
                    </div>
                    <div class=" form-row">
                        <div class="form-group col-md-4">
                            <label for="">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah" value="<?= $siswa['nama_ayah'] ?>">
                        </div>
                        <div class=" form-group col-md-4">
                            <label for="">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>">
                        </div>
                        <div class=" form-group col-md-4">
                            <label for="">Nomer Telepon Orang Tua</label>
                            <input type="number" class="form-control" name="ortu_notelp" value="<?= $siswa['ortu_notelp'] ?>">
                        </div>
                    </div>
                    <div class=" form-row">
                        <div class=" form-group col-md-4">
                            <label for="">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" name="pekerjaan_ayah" value="<?= $siswa['pekerjaan_ayah'] ?>">
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" name="pekerjaan_ibu" value="<?= $siswa['pekerjaan_ibu'] ?>">
                    </div>
                    <div class=" form-group">
                        <label for="">Alamat Orang Tua</label>
                        <input type="text" class="form-control" name="alamat_ortu" value="<?= $siswa['alamat_ortu'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Nama Wali</label>
                        <input type="text" class="form-control" name="nama_wali" value="<?= $siswa['nama_wali'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Wali Alamat</label>
                        <input type="text" class="form-control" name="wali_alamat" value="<?= $siswa['wali_alamat'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="">No Telepon Wali</label>
                        <input type="text" class="form-control" name="notelp_wali" value="<?= $siswa['notelp_wali'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Pekerjaan Wali</label>
                        <input type="text" class="form-control" name="wali_pkj" value="<?= $siswa['wali_pkj'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto">
                            <label class="custom-file-label" for="customFile">Pilih Foto</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            <!-- <button type="button" data-toggle="modal" data-target="#modalUbah" class="btn btn-warning mr-4" id="btn-edit">UBAH DATA</button> -->
            </form>
        </div>
    </div>

    </div><!-- .animated -->
</section>

<div class="modal fade" id="modalUbah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('siswa/ubah'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <?= csrf_field(); ?>
                    <div class="form-group ">
                        <label for="">NIP</label>
                        <input type="number" class="form-control " name="nip" id="nip">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option>Jenis Kelamin</option>

                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" ">
                                </div>
                            </div>
                            <div class=" form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <div class="invalid-feedback">

                                </div>
                                <label class="custom-file-label" for="customFile">Pilih Foto</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" name="ubah" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<script src="assets/js/init-scripts/data-table/datatables-ini.js"></script>