<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('kepsek') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Kepala Sekolah Baru</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Induk / Tambah Kepala Sekolah</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('kepsek/tambah'); ?>" autocomplete="off">
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
                        <input type="text" class="form-control" name="nama_kepsek">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="text" class="form-control" name="tahun">
                    </div>

                    <div class="form-group">
                        <label for="">Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ' '; ?>" id="foto" name="foto">
                            <label class="custom-file-label" for="customFile">Pilih Foto</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Tambah Data</button>
                </form>
            </div>
        </div>
    </div><!-- .animated -->
    <?= $this->endSection() ?>
    <script src="assets/js/init-scripts/data-table/datatables-ini.js"></script>