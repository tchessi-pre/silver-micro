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

// Requête SQL pour créer une nouvelle table si elle n'existe pas déjà
$sql = "CREATE TABLE IF NOT EXISTS Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    email VARCHAR(50),
    age INT,
    date_inscription DATETIME
)";

if ($conn->query($sql) === TRUE) {
  echo "<p>Table 'Users' créée avec succès ou existe déjà.</p>";
} else {
  echo "Erreur lors de la création de la table : " . $conn->error;
}

// Requête SQL pour ajouter un utilisateur à la table Users
$insert_sql = "INSERT INTO Users (nom, email, age, date_inscription) VALUES ('John4 Doe4', 'john4@example.com', 34, NOW())";

// Exécution de la requête SQL
if ($conn->query($insert_sql) === TRUE) {
  echo "<p>Utilisateur ajouté avec succès.</p>";
} else {
  echo "Erreur lors de l'ajout de l'utilisateur : " . $conn->error;
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
  echo "<p>Aucun utilisateur trouvé dans la base de données.</p>";
}

// Fermeture de la connexion à la base de données
$conn->close();
