<!DOCTYPE html>
<html>
<head>
    <title>Affichage des articles</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Liste des articles</h1>
    <table>
        <tr>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Catégorie</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mglsi_news";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection echoué: " . $conn->connect_error);
        }
        $sql = "SELECT a.titre, a.contenu, c.libelle AS categorie 
        FROM Article a
        INNER JOIN Categorie c ON a.categorie = c.id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["titre"]."</td><td>".$row["contenu"]."</td><td>".$row["categorie"]."</td></tr>";
            }
        } else {
            echo "Zéro resultats";
        }
        $conn->close();
        ?>
    </table>
    
</body>
</html>
