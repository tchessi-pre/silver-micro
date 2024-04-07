<?php
// Paramètres de connexion à la base de données
$servername = "mysql";
$username = "root";
$password = "password";
$database = "mydatabase";

// Connexion à la base de données MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
  die("Connexion échouée : " . $conn->connect_error);
} else {
  // Afficher un message indiquant que la connexion est réussie
  echo "<p>Connexion réussie à la base de données MySQL.</p>";
}

// Requête SQL pour sélectionner tous les utilisateurs de la table Users
$sql = "SELECT * FROM Users";

// Exécution de la requête SQL
$result = $conn->query($sql);

// Vérification si des résultats sont retournés
if ($result->num_rows > 0) {
  // Affichage des utilisateurs sous forme de tableau
  echo "<table border='1'>";
  echo "<tr><th>ID</th><th>Nom</th><th>Email</th><th>Age</th><th>Date d'inscription</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["nom"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["age"] . "</td>";
    echo "<td>" . $row["date_inscription"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "Aucun utilisateur trouvé dans la base de données.";
}

// Fermeture de la connexion à la base de données
$conn->close();
