<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Data Siswa</h1>
        <div class="section-header-button">
            <a href="<?= base_url('siswa/add') ?>" class="btn btn-primary">Tambah</a>
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
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4>Data Induk / Data Siswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-1" class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($siswa as $key => $value) : ?>
                                        <tr>
                                            <td><?= $value['nis'] ?></td>
                                            <td><?= $value['nisn'] ?></td>
                                            <td><?= $value['nama_siswa'] ?></td>
                                            <td>
                                                <a href="<?= base_url('siswa/edit/' . $value['id_siswa']) ?>" class="btn btn-primary btn-sm"></i>LIHAT</a>
                                                <a href="<?= base_url('siswa/hapus/' . $value['id_siswa']) ?>" class="btn btn-danger btn-sm"></i>HAPUS</a>
                                            </td>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>