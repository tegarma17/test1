<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('mapel') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Mata Pelajaran Baru</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Set Kelas / Tambah Mata Pelajaran</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('mapel/tambah'); ?>" autocomplete="off">
                    <div class="form-group ">
                        <label>Mata Pelajaran</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_mapel')) ? 'is-invalid' : ' '; ?>" name="nama_mapel">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_mapel'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>