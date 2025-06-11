<?php
$xml = simplexml_load_file("recepti.xml");
$kategorija = isset($_GET['kategorija']) ? $_GET['kategorija'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Katalog recepata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Katalog recepata</h1>
<?php session_start(); if (isset($_SESSION['user'])): ?>
    <p>Prijavljeni ste kao <strong><?= $_SESSION['user'] ?></strong>. <a href="logout.php">Odjava</a></p>
<?php else: ?>
    <p><a href="login.php">Prijava</a> | <a href="register.php">Registracija</a></p>
<?php endif; ?>
<form method="get">
    <input type="text" name="search" placeholder="Pretraži recepte..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
    <input type="submit" value="Pretraži">
</form>
<form method="get">
    <label>Filtriraj po kategoriji:
        <select name="kategorija" onchange="this.form.submit()">
            <option value="">Sve</option>
            <option value="Doručak">Doručak</option>
            <option value="Ručak">Ručak</option>
            <option value="Desert">Desert</option>
        </select>
    </label>
</form>
<div class="kontejner">
<?php foreach ($xml->recept as $recept): ?>
    <?php
    $search = isset($_GET['search']) ? strtolower($_GET['search']) : '';
    $naziv = strtolower((string)$recept->naziv);
    if (($kategorija == '' || $recept->kategorija == $kategorija) &&
        ($search == '' || strpos($naziv, $search) !== false)): ?>
    <div class="kartica">
        <img src="<?= $recept->slika ?>" alt="">
        <h2><?= $recept->naziv ?></h2>
        <p><strong>Kategorija:</strong> <?= $recept->kategorija ?></p>
        <p><?= $recept->opis ?></p>
        <a href="recept.php?id=<?= $recept['id'] ?>">Detalji</a>
    </div>
    <?php endif; ?>
<?php endforeach; ?>
</div>
<a href="dodaj.php" class="dodaj">Dodaj novi recept</a>
</body>
</html>