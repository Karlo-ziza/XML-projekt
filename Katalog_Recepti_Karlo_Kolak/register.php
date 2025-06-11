<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $xml = simplexml_load_file("korisnici.xml");
    foreach ($xml->korisnik as $korisnik) {
        if ((string)$korisnik->username === $_POST["username"]) {
            die("Korisničko ime već postoji.");
        }
    }
    $novi = $xml->addChild("korisnik");
    $novi->addChild("username", $_POST["username"]);
    $novi->addChild("password", $_POST["password"]);
    $xml->asXML("korisnici.xml");
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Registracija</title></head>
<body>
<h1>Registracija</h1>
<form method="post">
    Korisničko ime: <input type="text" name="username" required><br>
    Lozinka: <input type="password" name="password" required><br>
    <button type="submit">Registriraj se</button>
</form>
<a href="index.php">← Povratak</a>
</body>
</html>