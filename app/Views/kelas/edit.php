<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('kelas') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Ubah Data Kelas</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Induk / Ubah Kelas</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('kelas/ubah/' . $kelas['id_kelas']); ?>" autocomplete="off">
                    <div class="form-group ">
                        <label>Tingkat Kelas</label>
                        <input type="text" class="form-control" value="<?= $kelas['tingkat_kelas'] ?>" name="nama_kelas">
                    </div>
                    <div class="form-group ">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" value="<?= $kelas['nama_kelas'] ?>" name="nama_kelas">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>