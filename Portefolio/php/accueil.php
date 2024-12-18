<?php
$data = yaml_parse_file("data/accueil.yaml");

// Vérifier si la section de présentation existe et n'est pas vide
if (!empty($data['presentation'])) {
    $presentation = $data['presentation'];

    // Initialiser la variable pour la classe background si une image est fournie
    $backgroundStyle = '';
    if (!empty($presentation['image'])) {
        $imagePath = htmlspecialchars($presentation['image']);
        $backgroundStyle = 'style="background-image: url(\'' . $imagePath . '\');"';
    }

    // Ajouter la section avec l'image de fond
    echo '<section id="accueil" class="presentation-container" ' . $backgroundStyle . '>';
        echo '<div class="presentation-text">';
            echo '<h2>' . htmlspecialchars($presentation['prenom']) . ' ' . htmlspecialchars($presentation['nom']) . '</h2>';
            echo '<h3>' . htmlspecialchars($presentation['accroche']) . '</h3>';
            echo '<p>' . htmlspecialchars($presentation['description']) . '</p>';
        echo '</div>';
    echo '</section>';
}
?>
