<?php
$xml = simplexml_load_file("recepti.xml");
$id = $_GET['id'];
$recept = null;
foreach ($xml->recept as $r) {
    if ((string)$r['id'] === $id) {
        $recept = $r;
        break;
    }
}
if (!$recept) {
    echo "Recept nije pronađen!";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $recept->naziv ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="index.php">← Povratak</a>
<div class="detalji">
    <h1><?= $recept->naziv ?></h1>
    <img src="<?= $recept->slika ?>" alt="">
    <p><strong>Kategorija:</strong> <?= $recept->kategorija ?></p>
    <p><strong>Vrijeme pripreme:</strong> <?= $recept->vrijeme ?></p>
    <p><?= $recept->opis ?></p>
    <h3>Sastojci:</h3>
    <ul>
        <?php foreach ($recept->sastojci->sastojak as $s): ?>
            <li><?= $s ?></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>