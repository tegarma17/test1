<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('setmapel') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Set Mata Pelajaran Kelas</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Set Kelas / Set Mata Pelajaran</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('setmapel/tambah'); ?>" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="section-title">Pilih Guru</div>
                                <div class="form-group">
                                    <select class="form-control select2" name="id_guru" value="">
                                        <?php foreach ($guru as $key => $value) : ?>
                                            <option value="<?= $value['id'] ?>"> <?= $value['nama_guru'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="section-title">Pilih Kelas</div>
                                <div class="form-group">
                                    <select class="form-control select2" name="id_kelas" value="">
                                        <?php foreach ($kelas as $key => $value) : ?>
                                            <option value="<?= $value['id_kelas'] ?>"> <?= $value['nama_kelas'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="section-title">Pilih Mata Pelajaran</div>
                                <div class="form-group">
                                    <select class="form-control select2 select2-hidden-accessible <?= $validation->hasError('id_mapel') ?>" name="id_mapel[]" multiple required>
                                        <?php foreach ($mapel as $key => $value) : ?>
                                            <option value="<?= $value['id_mapel'] ?>"> <?= $value['nama_mapel'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_mapel'); ?>
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