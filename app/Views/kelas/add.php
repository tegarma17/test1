<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('kelas') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Kelas Baru</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Induk / Tambah Kelas</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('kelas/tambah'); ?>" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group ">
                        <label>Tingkat Kelas</label>
                        <input type="number" class="form-control " name="tingkat_kelas">
                    </div>
                    <div class="form-group ">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_kelas')) ? 'is-invalid' : ' '; ?>" name="nama_kelas">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_kelas'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>