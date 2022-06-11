<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Data Nilai</h1>
        <div class="section-header-button">

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
                <h4>Data Nilai / Nilai Keterampilan</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($getmapel as $key => $value) : ?>
                            <tr>
                                <td><?= $value['nama_mapel'] ?></td>
                                <td>
                                    <a href="<?= base_url('n_keterampilan/kd/' . $value['id_mapel']) ?>" class="btn btn-primary btn-sm"></i>TAMBAH KD</a>
                                </td>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>