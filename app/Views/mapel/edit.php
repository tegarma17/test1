<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('mapel') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Ubah Data Mata Pelajaran</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Set Kelas / Ubah Mata Pelajaran</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('mapel/ubah/' . $mapel['id_mapel']); ?>" autocomplete="off">
                    <div class="form-group ">
                        <label>Mata Pelajaran</label>
                        <input type="text" class="form-control" value="<?= $mapel['nama_mapel'] ?>" name="nama_mapel">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>