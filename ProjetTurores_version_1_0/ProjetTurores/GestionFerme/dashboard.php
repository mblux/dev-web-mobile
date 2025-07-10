<?php
require "config/function.php";


$lsAnimeauQuery = "SELECT animeaux.*, DATEDIFF(CURRENT_DATE(), date_naissance)/365 AS age, especes.nom as espece, betails.nom AS betail FROM animeaux 
    LEFT JOIN especes ON especes.id=animeaux.idEspece 
    LEFT JOIN betails ON betails.id=animeaux.idBetail ORDER BY dateAjout";

$headers = apache_request_headers();

if (isset($headers['Accept']) && $headers['Accept'] == "Application/json") {
    $lsAnimeaux = select($lsAnimeauQuery);
    header("Content-Type: Application/json");
    echo json_encode($lsAnimeaux);
    exit();
}
$lsAnimeauQuery .= " LIMIT 7";
$lsAnimeaux = select($lsAnimeauQuery);
$totalAnimaux = getCount("animeaux");
$totalEspece = getCount("especes");
$totalTypeBetail = getCount("betails");
$totalNouveau = getCount("animeaux", "WHERE DATE((NOW() - dateAjout)) < DATE('0000-00-07')");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestion de Ferme</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>

    <?php
    require "partial/sidebare.php";
    ?>

    <!-- Main Content -->
    <div class="main-content">
        <?php
        require "partial/header.php";
        ?>
        <!-- Cards -->
        <div class="cards-container">
            <div class="card card-primary">
                <div class="card-title">Total Animaux</div>
                <div class="card-value"><?= $totalAnimaux ?></div>
            </div>
            <div class="card card-primary">
                <div class="card-title">Espèces</div>
                <div class="card-value"><?= $totalEspece ?></div>
            </div>
            <div class="card card-primary">
                <div class="card-title">Types de Bétail</div>
                <div class="card-value"><?= $totalTypeBetail ?></div>
            </div>
            <div class="card card-primary">
                <div class="card-title">Nouveaux (7j)</div>
                <div class="card-value"><?= $totalNouveau ?></div>
            </div>
        </div>
        <!-- Recent Animals -->
        <div class="recent-animals">
            <div class="table-header">
                <div class="chart-title">Animaux Récemment Ajoutés</div>
                <a onclick="fetchData()" href="#">Voir tout</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Espèce</th>
                        <th>Bétail</th>
                        <th>Date Naissance</th>
                        <th>Âge</th>
                    </tr>
                </thead>
                <tbody id="animaux-tbody">

                </tbody>
            </table>
        </div>
    </div>

    <script>
        let lsAnimeaux = <?= json_encode($lsAnimeaux) ?>;
        function loadData() {
            let tbody = document.getElementById("animaux-tbody");
            tbody.innerHTML = ""
            lsAnimeaux.forEach(animal => {
                let tr = document.createElement("tr")
                tr.innerHTML = `
                    <td>${animal.nom}</td>
                    <td><span class="badge badge-primary">${animal.espece}</span></td>
                    <td>${animal.betail}</td>
                    <td>${animal.date_naissance}</td>
                    <td>${animal.age}ans</td>
                `
                tbody.append(tr)
            });
        }
        loadData()

        function fetchData() {
            console.log("On loading")
            fetch("", {
                headers: {
                    "Accept": "Application/json"
                }
            }).then(async response => {
                if (response.status == 200) {
                    let jsonReponse = await response.json()
                    lsAnimeaux = jsonReponse;
                    loadData()
                }
            })
        }
    </script>
</body>

</html>