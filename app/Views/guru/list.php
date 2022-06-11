<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Data Guru</h1>
        <div class="section-header-button">
            <a href="<?= base_url('guru/add') ?>" class="btn btn-primary">Tambah</a>
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
                        <h4>Data Induk / Data Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-1" class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($guru as $key => $value) : ?>
                                        <tr>
                                            <td><?= $value['nip'] ?></td>
                                            <td><?= $value['nama_guru'] ?></td>
                                            <td><?= $value['alamat'] ?></td>
                                            <td><a href="<?= base_url('guru/edit/' . $value['id']) ?>" class="btn btn-primary btn-sm"></i>LIHAT</a>
                                                <a href="<?= base_url('guru/hapus/' . $value['id']) ?>" class="btn btn-danger btn-sm"></i>DELETE</a>
                                            </td>
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