<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('walikelas') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Ubah Data Walikelas</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Set Kelas / Walikelas</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('walikelas/ubah/'); ?>" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="section-title">Pilih Guru</div>
                                <div class="form-group">
                                    <select name="id_guru" id="id_guru" class="form-control">

                                        <option value="">Pilih Guru</option>
                                        <?php foreach ($guru as $g) :  ?>
                                            <option value="<?= $g['id'] ?>" <?= $g['id'] == $walikelas['id_guru'] ? 'selected' : '' ?>><?= $g->nama_kelas ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="section-title">Pilih Kelas</div>
                                <div class="form-group">
                                    <select name="id_kelas" id="id_kelas" class="form-control">
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($kelas as $k) : ?>
                                            <option value="<?= $k->id_kelas ?>" <?= $k->id_kelas == $walikelas->id_kelas ? 'selected' : '' ?>><?= $k->nama_kelas ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="section-title">Pilih Siswa</div>
                                <div class="form-group">
                                    <select name="id_siswa" id="id_siswa" class="form-control">
                                        <option value="">Pilih Siswa</option>
                                        <?php foreach ($siswa as $s) : ?>
                                            <option value="<?= $s->id_siswa ?>" <?= $s->id_siswa == $walikelas->id_siswa ? 'selected' : '' ?>><?= $s->nama_siswa ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>