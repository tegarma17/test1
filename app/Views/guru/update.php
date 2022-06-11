<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('guru') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Lihat Data Guru </h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Induk / Data Guru</h4>
            </div>
            <div class="card-body">
                <form method="post" action="" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group ">
                        <label for="">NIP</label>
                        <input type="number" class="form-control" name="nip" value="<?= $guru->nip ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_guru">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                            <option>Jenis Kelamin</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto">
                            <label class="custom-file-label" for="customFile">Pilih Foto</label>
                        </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div><!-- .animated -->
    
    <?= $this->endSection() ?>


    <script src="assets/js/init-scripts/data-table/datatables-ini.js"></script>