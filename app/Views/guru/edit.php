<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('guru') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Lihat Data Guru <?= $guru['nama_guru'] ?> </h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Induk / Data Guru</h4>
            </div>
            <div class="card-body">
                <div class="col-md-3 ">
                    <img src="/img/<?= $guru['foto'] ?>" class="rounded-circle" alt="">
                </div>
                <form method="post" action="<?= base_url('guru/ubah/' . $guru['id']) ?>">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group ">
                        <label for="">NIP</label>
                        <input type="number" class="form-control " name="nip" value="<?= $guru['nip'] ?>" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_guru" value="<?= $guru['nama_guru'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option>Jenis Kelamin</option>
                            <?php $jk = $guru['jk'] ?>
                            <option <?= ($jk == 'Laki - Laki') ? 'selected="selected"' : '' ?>>Laki - Laki</option>
                            <option <?= ($jk == 'Perempuan') ? 'selected="selected"' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" value="<?= $guru['tempat_lahir'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="<?= $guru['tanggal_lahir'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $guru['alamat'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
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
                <form method="post" action="<?= base_url('guru/ubah'); ?>" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" name="nama_guru" id="nama_guru" required>
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