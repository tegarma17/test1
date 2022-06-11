<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('guru') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah User Baru Baru</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data User / Akun Guru</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('user/tambah'); ?>" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group ">
                        <label for="">Username</label>
                        <input type="number" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ' '; ?>" name="username" value="<?= $this->guru->nip ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nip'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Tambah Data</button>
                </form>
            </div>
        </div>
    </div><!-- .animated -->
    <?= $this->endSection() ?>
    <script src="assets/js/init-scripts/data-table/datatables-ini.js"></script>