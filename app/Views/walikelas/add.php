<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('walikelas') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Wali Kelas</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Set Kelas / Tambah Wali Kelas</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('walikelas/tambah'); ?>" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="section-title">Pilih Guru</div>
                                <div class="form-group">
                                    <select class="form-control select2" name="id_guru">
                                        <?php foreach ($guru as $key => $value) : ?>
                                            <option value="<?= $value['id'] ?>"> <?= $value['nama_guru'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="section-title">Pilih Kelas</div>
                                <div class="form-group">
                                    <select class="form-control select2" name="id_kelas">
                                        <?php foreach ($kelas as $key => $value) : ?>
                                            <option value="<?= $value['id_kelas'] ?>"> <?= $value['nama_kelas'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="section-title">Pilih Siswa</div>
                                <div class="form-group">
                                    <select class="form-control select2 <?= $validation->hasError('id_siswa') ?  'is-invalid' : null; ?>" name="id_siswa[]" multiple>
                                        <?php foreach ($siswa as $key => $value) : ?>
                                            <option value="<?= $value['id_siswa'] ?>"> <?= $value['nama_siswa'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_siswa'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>