<?php
session_start();
$ADMIN_PASSWORD = "123456"; 

// 1. Login simple
if (!isset($_SESSION['admin'])) {
    if (isset($_POST['password']) && $_POST['password'] === $ADMIN_PASSWORD) {
        $_SESSION['admin'] = true;
    } else {
        echo '<form method="POST">
                <input type="password" name="password" placeholder="Mot de passe admin" required>
                <button type="submit">Se connecter</button>
              </form>';
        exit;
    }
}

// 2. Connexion à la DB
$conn = new mysqli("localhost", "root", "", "portfolio_db");
if ($conn->connect_error) die("Connexion échouée: ".$conn->connect_error);

// 3. Récupérer les messages
$result = $conn->query("SELECT * FROM messages ORDER BY date_envoi DESC");
?>

<h1>Messages reçus</h1>
<table border="1" cellpadding="5" cellspacing="0">
<tr><th>ID</th><th>Nom</th><th>Email</th><th>Message</th><th>Date</th></tr>
<?php while($row = $result->fetch_assoc()){
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nom']}</td>
            <td>{$row['email']}</td>
            <td>{$row['message']}</td>
            <td>{$row['date_envoi']}</td>
          </tr>";
} ?>
</table>
