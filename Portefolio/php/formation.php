<?php

$data = yaml_parse_file("data/formation.yaml");

// Début de la section de formations avec un identifiant
echo '<section id="formations">';
echo '<h2>Mes Formations</h2>';

// Conteneur principal pour les formations
echo '<div class="formation-container">';

// Si un lien de CV est défini, afficher le bouton pour télécharger le CV
if (isset($data['lien_cv'])) {
    echo '<div class="cv-section">';
    echo '<a href="' . htmlspecialchars($data['lien_cv']) . '" target="_blank" class="cv-button">Télécharger mon CV</a>';
    echo '</div>';
}

// Table des formations
echo '<table class="formation-table">';
echo '<thead>';
echo '<tr>';
echo '<th>Nom</th>';          // Colonne pour le nom de la formation
echo '<th>Établissement</th>'; // Colonne pour le nom de l'établissement
echo '<th>Dates</th>';         // Colonne pour les dates de début et de fin
echo '<th>Lieu</th>';          // Colonne pour le lieu de la formation
echo '<th>Contenu</th>';       // Colonne pour le contenu de la formation
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// Boucle pour parcourir chaque formation
foreach ($data['formations'] as $formation) {
    // Filtrage des données et sécurisation avec htmlspecialchars
    $nom = htmlspecialchars($formation['nom']);
    $etablissement = htmlspecialchars($formation['etablissement']);
    $date_debut = htmlspecialchars($formation['date_debut']);
    $date_fin = htmlspecialchars($formation['date_fin']);
    $lieu = htmlspecialchars($formation['lieu']);
    $contenu = htmlspecialchars($formation['contenu']);
    
    // Affichage de chaque ligne de la table avec les données formatées
    echo '<tr>';
    echo '<td>' . $nom . '</td>';
    echo '<td>' . $etablissement . '</td>';
    echo '<td>' . $date_debut . ' - ' . $date_fin . '</td>';
    echo '<td>' . $lieu . '</td>';
    echo '<td>' . $contenu . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

echo '</div>'; 
echo '</section>'; 
?>
