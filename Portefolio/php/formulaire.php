<?php

$form_data = yaml_parse_file("data/formulaire.yaml");

// Déclaration des variables avec des valeurs initiales vides
$nom = '';
$email = '';
$objet = '';
$message = '';
$captcha = '';
$captcha_result = '';
$errors = [];
$success_message = '';

// Vérification de la méthode de soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données postées
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $objet = $_POST['objet'] ?? '';
    $message = $_POST['message'] ?? '';
    $captcha = $_POST['captcha'] ?? '';
    $captcha_result = $_POST['captcha_result'] ?? '';

    // Validation des données
    if (empty($nom)) $errors[] = "Le nom est requis.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Une adresse email valide est requise.";
    if (empty($objet)) $errors[] = "L'objet est requis.";
    if (empty($message)) $errors[] = "Le message est requis.";
    if (empty($captcha) || $captcha != $captcha_result) $errors[] = "La vérification CAPTCHA est incorrecte.";

    // Si aucune erreur, envoi du mail
    if (empty($errors)) {
        $to = 'maddie.audrain@sts-sio-caen.info'; // Destinataire du mail
        $subject = $objet; // Sujet du mail
        $body = "Nom: $nom\nEmail: $email\nMessage:\n$message"; // Corps du message
        $headers = "From: $email"; // En-tête du mail

        if (mail($to, $subject, $body, $headers)) {
            // Message de succès
            $success_message = $form_data['formulaire']['reponse_succes'];
            // Réinitialisation des champs du formulaire après succès
            $nom = '';
            $email = '';
            $objet = '';
            $message = '';
            $captcha = '';
        } else {
            $errors[] = $form_data['formulaire']['reponse_erreur'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil.css">
</head>
<body>
    <section id="formulaire">
        <div class="form-container">
            <?php if (!empty($success_message)) : ?>
                <div class="success"><?= htmlspecialchars($success_message) ?></div>
            <?php elseif (!empty($errors)) : ?>
                <div class="errors">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="#formulaire" method="POST">
                <h2>Contactez-nous</h2>
                <p>Vos données ne seront pas conservées conformément au RGPD.</p>

                <label for="nom"><?= htmlspecialchars($form_data['formulaire']['nom']) ?></label>
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom) ?>" required>

                <label for="email"><?= htmlspecialchars($form_data['formulaire']['email']) ?></label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

                <label for="objet"><?= htmlspecialchars($form_data['formulaire']['objet']) ?></label>
                <input type="text" id="objet" name="objet" value="<?= htmlspecialchars($objet) ?>" required>

                <label for="message"><?= htmlspecialchars($form_data['formulaire']['message']) ?></label>
                <textarea id="message" name="message" rows="5" required><?= htmlspecialchars($message) ?></textarea>

                <?php
                // Génération du captcha
                $num1 = rand(1, 10);
                $num2 = rand(1, 10);
                $captcha_result = $num1 + $num2;
                ?>
                <label for="captcha"><?= htmlspecialchars($form_data['formulaire']['captcha']) ?> <?= $num1 ?> + <?= $num2 ?> :</label>
                <input type="number" id="captcha" name="captcha" required>
                <input type="hidden" name="captcha_result" value="<?= $captcha_result ?>">
                <button type="submit" class="btn"><?= htmlspecialchars($form_data['formulaire']['bouton_envoyer']) ?></button>
            </form>
        </div>
    </section>
</body>
</html>
