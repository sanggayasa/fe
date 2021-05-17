<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <img class="card-img-top" src="/img/<?= $komik['sampul']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $komik['judul']; ?></h5>
                    <p class="card-text"><?= $komik['penulis']; ?></p>
                    <p class="card-text"><small class="text-muted"><?= $komik['penerbit']; ?></small>
                    </p>
                    <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>
                    <form action="/komik/<?= $komik['id']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?');">Delete</button>
                    </form>
                    <!-- <a href="/komik/delete/<?= $komik['id']; ?>" class="btn btn-danger">Delete</a> -->
                    <br>
                    <a href="/komik">kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>