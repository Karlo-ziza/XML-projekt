<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $xml = simplexml_load_file("korisnici.xml");
    foreach ($xml->korisnik as $korisnik) {
        if ((string)$korisnik->username === $_POST["username"] &&
            (string)$korisnik->password === $_POST["password"]) {
            $_SESSION["user"] = $_POST["username"];
            header("Location: index.php");
            exit;
        }
    }
    echo "Neispravno korisničko ime ili lozinka.";
}
?>
<!DOCTYPE html>
<html>
<head><title>Prijava</title></head>
<body>
<h1>Prijava</h1>
<form method="post">
    Korisničko ime: <input type="text" name="username" required><br>
    Lozinka: <input type="password" name="password" required><br>
    <button type="submit">Prijavi se</button>
</form>
<a href="register.php">Registriraj se</a><br>
<a href="index.php">← Povratak</a>
</body>
</html>