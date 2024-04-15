<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Informações sobre COVID-19</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Informações sobre COVID-19</h1>
<form action="index.php" method="get">
    <label for="countrySelect">Escolha um país:</label>
    <select id="countrySelect" name="country">
        <option value="Brazil">Brasil</option>
        <option value="Canada">Canadá</option>
        <option value="Australia">Austrália</option>
    </select>
    <input type="submit" value="Obter Dados">
</form>



<?php
// Conexão com o banco de dados
$host = "localhost";
$username = "root";
$password = "PipoCa123!";
$dbname = "covid_acess_logs";
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar se o formulário foi submetido
if (isset($_GET['country'])) {
    $country = $_GET['country'];

    // Obter dados da API-Covid-19
    $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$country";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    // Somar os casos confirmados e mortes de todos os estados
    $confirmedCases = array_sum(array_column($data, 'Confirmados'));
    $deaths = array_sum(array_column($data, 'Mortos'));

    // Exibir os dados na página
    echo "<h2>$country</h2>";
    echo "<p>Casos confirmados totais: $confirmedCases</p>";
    echo "<p>Mortes totais: $deaths</p>";

    // Inserir registro de acesso no banco de dados
    $access_datetime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO access_logs (access_datetime, chosen_country) VALUES ('$access_datetime', '$country')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Recuperar o último registro de acesso
$sql = "SELECT access_datetime, chosen_country FROM access_logs ORDER BY access_datetime DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastAccessDatetime = $row["access_datetime"];
    $lastAccessCountry = $row["chosen_country"];
} else {
    $lastAccessDatetime = "Nenhum registro encontrado";
    $lastAccessCountry = "Nenhum registro encontrado";
}
$conn->close();
?>


<footer>
    <p>Horário último acesso: <?php echo $lastAccessDatetime; ?></p>
    <p>Último país acessado: <?php echo $lastAccessCountry; ?></p>
</footer>

</body>
</html>

