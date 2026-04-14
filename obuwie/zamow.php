<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>

    <main>
        <h2>Zamówienie</h2>
            <?php
if (isset($_POST["przycisk"]) && !empty($_POST['pary'])) {
    $connection = mysqli_connect('localhost', 'root', '', 'obuwie');
    $model = $_POST["model"];
    $rozmiar = $_POST["rozmiar"];
    $pary = $_POST["pary"];

    $query3 = "SELECT buty.nazwa, buty.cena, produkt.kolor, produkt.kod_produktu, produkt.material, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model WHERE buty.model = '{$model}'";
    $result3 = mysqli_query($connection, $query3);
    $row = mysqli_fetch_array($result3);

    echo "<img src='{$row['nazwa_pliku']}' alt='but męski'>";
    echo "<h2>{$row['nazwa']}</h2>";
    $wartosc = $pary * $row['cena'];
    echo "<p>cena za {$pary} par: {$wartosc} zł</p>";
    echo "<p>Szczegóły produktu: {$row['kolor']}, {$row['material']}</p>";
    echo "<p>Rozmiar: {$rozmiar}</p>";

    mysqli_close($connection);
}
?>

            <a href="index.php">Strona główna</a>
    </main>

    <footer>
        <p>Autor strony: 00000000000</p>
    </footer>
</body>
</html>