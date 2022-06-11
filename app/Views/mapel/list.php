<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Data Mapel</h1>
        <div class="section-header-button">
            <a href="<?= base_url('mapel/add') ?>" class="btn btn-primary">Tambah</a>
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
                <h4>Data Set Kelas / Data Mapel</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($mapel as $key => $value) : ?>
                            <tr>
                                <td><?= $value['nama_mapel'] ?></td>
                                <td>
                                    <a href="<?= base_url('mapel/edit/' . $value['id_mapel']) ?>" class="btn btn-primary btn-sm"></i>UBAH</a>
                                    <a href="<?= base_url('mapel/hapus/' . $value['id_mapel']) ?>" class="btn btn-danger btn-sm"></i>DELETE</a>

                                </td>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>