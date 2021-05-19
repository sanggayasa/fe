<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h1>Daftar Komik</h1>
<a href="/komik/create" class="btn btn-primary mt-3">Tambah Komik</a>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>
<form action="" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Masukan Keyword Pencarian" name="keyword">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
        </div>
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">sampul</th>
            <th scope="col">judul</th>
            <th scope="col">aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $i = 1 + (5 * ($currentPage - 1));
            foreach ($komik as $k) : ?>
                <th scope="row"><?= $i++ ?></th>
                <td><img src="img/<?= $k['sampul']; ?>" alt="" class="sampul"></td>
                <td><?= $k['judul']; ?></td>
                <td>
                    <a href="komik/<?= $k['slug'] ?>" class="btn btn-success">detail</a>
                </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?= $pager->links('komik', 'komik_pagination'); ?>
<?= $this->endSection(); ?>