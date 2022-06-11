<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('n_pengetahuan/kd/' . $id_mapel) ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
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
                <h4>Data Nilai / Nilai Pengetahuan / Nilai Ulangan Harian</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>Nilai Siswa</th>
                            <th>Nilai Tugas</th>
                        </tr>
                        <?php $index = 0; ?>
                        <?php foreach ($data_siswa as $key => $value) : ?>
                            <form method="POST" action="<?= base_url('n_pengetahuan/simpanUH'); ?>" autocomplete="off" multiple>
                                <tr>

                                    <input type="hidden" name="id_guru_mapel[]" value="<?= $ambil_mapel_guru[0]['id_guru_mapel'] ?>">
                                    <input type="hidden" name="id_siswa[]" value="<?= $value['id_siswa'] ?>">
                                    <input type="hidden" name="id_kd[]" value="<?= $id_kd ?>">
                                    <td><?= $value['nama_siswa'] ?></td>
                                    <td>
                                        <div class=" form-group">
                                            <input type="number" name="nilai[]" value="<?= !empty($cek_nilai[$index]['nilai']) ? $cek_nilai[$index]['nilai'] : 0 ?>" class=" form-control">
                                        </div>
                                    </td>
                                <tr>
                                    <?php $index++; ?>
                                <?php endforeach; ?>

                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary m-2">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>