<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('mapel') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Nilai Siswa</h1>
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
                <h4>Data Kelas / Nilai Keterampilan</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-md ">
                    <?= csrf_field(); ?>
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Sakit</th>
                            <th>Izin</th>
                            <th>Tanpa Keterangan</th>
                        </tr>

                        <form method="POST" action="<?= base_url('n_absensi/tambah') ?>" autocomplete="off">
                            <?php $index = 0; ?>
                            <?php foreach ($data_siswa as $key => $value) : ?>
                                <tr>
                                    <td><?= $value['nama_siswa'] ?></td>
                                    <input type="hidden" class="form-control" name="id_siswa[]" value=<?= $value['id_siswa'] ?>>
                                    <td>
                                        <div class=" form-group ">
                                            <input type=" number" class="form-control " name="s[]" value="<?= !empty($absen) ? $absen[$index]['s'] : '0'  ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group ">
                                            <input type="number" class="form-control " name="i[]" value="<?= !empty($absen) ? $absen[$index]['i'] : '0'  ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group ">
                                            <input type="number" class="form-control " name="a[]" value="<?= !empty($absen) ? $absen[$index]['a'] : '0'  ?>">
                                        </div>
                                    </td>
                                    <?php $index++; ?>
                                <?php endforeach; ?>
                    </thead>
                </table>
                <button type="submit" class="btn btn-primary my-3 ml-2">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>