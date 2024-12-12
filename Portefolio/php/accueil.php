<?php
$data = yaml_parse_file("data/accueil.yaml");


if (!empty($data['presentation'])) {
    $presentation = $data['presentation'];

    $backgroundStyle = '';
    if (!empty($presentation['image'])) {
        $imagePath = htmlspecialchars($presentation['image']);
        $backgroundStyle = 'style="background-image: url(\'' . $imagePath . '\');"';
    }

    // Ajouter la section avec l'image en fond
    echo '<section id="accueil" class="presentation-container" ' . $backgroundStyle . '>';
    echo '<div class="presentation-text">';
    echo '<h2>' . htmlspecialchars($presentation['prenom']) . ' ' . htmlspecialchars($presentation['nom']) . '</h2>';
    echo '<h3>' . htmlspecialchars($presentation['accroche']) . '</h3>';
    echo '<p>' . htmlspecialchars($presentation['description']) . '</p>';
    echo '</div>';
    echo '</section>';
}
?>

