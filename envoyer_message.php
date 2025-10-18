<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$dbname = "portfolio_db";
$user = "root";
$pass = "";

// Connexion
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("Connexion échouée: ".$conn->connect_error);


$nom = $_POST['nom'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if($nom === '' || $email === '' || $message === ''){
    die("Erreur : tous les champs doivent être remplis !");
}

$stmt = $conn->prepare("INSERT INTO messages (nom, email, message) VALUES (?, ?, ?)");
if(!$stmt) die("Erreur préparation requête : ".$conn->error);
$stmt->bind_param("sss", $nom, $email, $message);

// Exécution
if($stmt->execute()){
    // ✅ Sauvegarde réussie → on redirige proprement vers index.html
    header("Location: index.php");
    echo "<script> alert('Merci pour votre message ! Je vous répondrai bientôt.'); window.location.href='index.p'; </script>";
    exit();
} else {
    die("Erreur lors de l'enregistrement : ".$stmt->error);
}

$stmt->close();
$conn->close();
?>
