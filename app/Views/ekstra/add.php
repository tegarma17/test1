<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('ekstra') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Ekstrakulikuler Baru</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Set Kelas / Tambah Ekstrakulikuler</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('ekstra/tambah'); ?>" autocomplete="off">
                    <div class="form-group ">
                        <label>Ekstrakulikuler</label>
                        <input type="text" class="form-control" name="nama_ekstra">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>