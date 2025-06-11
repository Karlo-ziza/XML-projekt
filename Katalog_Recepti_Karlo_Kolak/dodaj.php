<?php session_start(); if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; } ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dodaj recept</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Dodaj novi recept</h1>
<form method="post" action="spremi.php">
    <label>Naziv: <input type="text" name="naziv" required></label><br>
    <label>Opis: <textarea name="opis" required></textarea></label><br>
    <label>Vrijeme pripreme: <input type="text" name="vrijeme" required></label><br>
    <label>Kategorija:
        <select name="kategorija">
            <option value="Doručak">Doručak</option>
            <option value="Ručak">Ručak</option>
            <option value="Desert">Desert</option>
        </select>
    </label><br>
    <label>Slika (naziv datoteke): <input type="text" name="slika" required></label><br>
    <label>Sastojci (odvojeni zarezom): <input type="text" name="sastojci" required></label><br>
    <button type="submit">Spremi</button>
</form>
<a href="index.php">← Povratak</a>
</body>
</html>