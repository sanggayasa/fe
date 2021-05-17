<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h1>ini Komik</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $i = 1;
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
<?= $this->endSection(); ?>