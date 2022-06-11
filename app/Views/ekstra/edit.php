<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('ekstra') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Ubah Data Ekstrakulikuler</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Set Kelas / Ubah Ekstrakulikuler</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('ekstra/ubah/' . $ekstra['id']); ?>" autocomplete="off">
                    <div class="form-group ">
                        <label>Ekstrakulikuler</label>
                        <input type="text" class="form-control" value="<?= $ekstra['nama_ekstra'] ?>" name="nama_ekstra">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>