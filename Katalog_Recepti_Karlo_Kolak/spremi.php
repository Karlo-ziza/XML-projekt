<?php
$xml = simplexml_load_file("recepti.xml");
$id = count($xml->recept) + 1;
$recept = $xml->addChild("recept");
$recept->addAttribute("id", $id);
$recept->addChild("naziv", $_POST["naziv"]);
$recept->addChild("opis", $_POST["opis"]);
$recept->addChild("vrijeme", $_POST["vrijeme"]);
$recept->addChild("kategorija", $_POST["kategorija"]);
$sastojci = $recept->addChild("sastojci");
foreach (explode(",", $_POST["sastojci"]) as $s) {
    $sastojci->addChild("sastojak", trim($s));
}
$recept->addChild("slika", $_POST["slika"]);
$xml->asXML("recepti.xml");
header("Location: index.php");
?>