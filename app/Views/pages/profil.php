<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>profil</contact>
</body>
<?php foreach ($alamat as $a) : ?>
    <ul>
        <li><?= $a['tipe']; ?></li>
        <li><?= $a['alamat']; ?></li>
        <li><?= $a['kota']; ?></li>
    </ul>
<?php endforeach; ?>

</html>