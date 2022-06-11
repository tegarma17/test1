<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('n_sikap_so') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Kompetensi Dasar</h1>
        <div class="section-header-button">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelTambah">
                Tambah
            </button>
        </div>
    </div>
    <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
    <?php if (session()->get('message')) : ?>
        <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Mata Pelajaran Berhasil Ditambahkan<strong><?= session()->getFlashdata('message'); ?></strong>
    </div> -->
    <?php endif; ?>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Nilai / Kompetensi Dasar</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>Kode KD</th>
                            <th>Kompetensi Dasar</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($kd as $key => $value) : ?>
                            <tr>
                                <td><?= $value['kode_kd'] ?></td>
                                <td><?= $value['nama_kd'] ?></td>
                                <td>
                                    <a href="<?= base_url('n_sikap_so/nilaitugas/' . $value['id']) ?>" class="btn btn-primary btn-sm"></i>TUGAS</a>
                                    <a href="<?= base_url('n_sikap_so/setnilai') ?>" class="btn btn-primary btn-sm"></i>ULANGAN HARIAN</a>
                                    <a href="<?= base_url('n_sikap_so/setnilai') ?>" class="btn btn-primary btn-sm"></i>UTS</a>
                                    <a href="<?= base_url('n_sikap_so/setnilai') ?>" class="btn btn-primary btn-sm"></i>UAS</a>
                                </td>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modelTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah KD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('n_sikap_so/tambahkd'); ?>" autocomplete="off">
                    <div class="form-group ">
                        <label>Kode KD</label>
                        <input type="text" class="form-control <?= ($validation->hasError('kode_kd')) ? 'is-invalid' : ' '; ?>" name="kode_kd">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_mapel'); ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label>Kompetensi Dasar</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_mapel')) ? 'is-invalid' : ' '; ?>" name="nama_kd">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_mapel'); ?>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>