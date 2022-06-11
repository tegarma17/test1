<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Selamat Datang <?=session()->get('nama_user')?></h1>
    </div>
    <h1>SDN Kebun 1 Kamal </h1>
    <p>Nama : <?= session()->get('nama_user')?></p>
    <p>NIP : <?= session()->get('username')?></p>
</section>
<?= $this->endSection() ?>