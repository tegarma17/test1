<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('guru') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Guru Baru</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Induk / Tambah Guru</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('guru/tambah'); ?>" autocomplete="off" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group ">
                        <label for="">NIP</label>
                        <input type="number" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ' '; ?>" name="nip">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nip'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_guru')) ? 'is-invalid' : ' '; ?>" name="nama_guru">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_guru'); ?>
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
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
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