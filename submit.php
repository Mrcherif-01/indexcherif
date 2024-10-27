<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'votre_base'; // Remplacez par le nom de votre base de données
$username = 'votre_utilisateur'; // Remplacez par votre nom d'utilisateur
$password = 'votre_motdepasse'; // Remplacez par votre mot de passe

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $da = $_POST['da']; // Date d'arrivée
    $nn = $_POST['nn']; // Nom
    $np = $_POST['pre']; // Prénom
    $tel = $_POST['tel']; // Téléphone
    $nbp = $_POST['nbp']; // Nombre de personnes
    $nbc = $_POST['nbc']; // Nombre de chambres
    $num_res = $_POST['num_res']; // Numéro de réservation
    $em =$_post['em'];

    // Afficher les valeurs pour le débogage
    echo "Nom: $nn, Prénom: $np, Téléphone: $tel, Date d'arrivée: $da, Nombre de personnes: $nbp, Nombre de chambres: $nbc, Numéro de réservation: $num_res<br>";

    // Préparation de la requête SQL pour l'insertion
    $sql = "INSERT INTO reservation (nom, prenom, tel, em,da, nombres_personnes, nombres_chambres, numero_reservation) 
            VALUES (:nom, :prenom, :tel,em: ,:dateA, :nbp, :nbc, :num_res)";
    $stmt = $pdo->prepare($sql);

    // Exécution de la requête avec les valeurs
    $stmt->execute([
        ':nom' => $nn,
        ':prenom' => $np,
        ':tel' => $tel,
        ':da' => $da,
        ':nbp' => $nbp,
        ':nbc' => $nbc,
        ':num_res' => $num_res
    ]);

    // Vérifier le nombre de lignes affectées
    if ($stmt->rowCount() > 0) {
        echo "Données enregistrées avec succès!";
    } else {
        echo "Aucune donnée insérée.";
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
