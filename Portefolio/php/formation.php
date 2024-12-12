<?php
$data = yaml_parse_file("data/formation.yaml");

echo '<h2>Mes Formations</h2>';

echo '<div class="formation-container">';

if (isset($data['lien_cv'])) {
    echo '<div class="cv-section">';
    echo '<a href="' . htmlspecialchars($data['lien_cv']) . '" target="_blank" class="cv-button">Télécharger mon CV</a>';
    echo '</div>';
}

echo '<table class="formation-table">';
echo '<thead>';
echo '<tr>';
echo '<th>Nom</th>';
echo '<th>Établissement</th>';
echo '<th>Dates</th>';
echo '<th>Lieu</th>';
echo '<th>Contenu</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($data['formations'] as $formation) {
    $nom = htmlspecialchars($formation['nom']);
    $etablissement = htmlspecialchars($formation['etablissement']);
    $date_debut = htmlspecialchars($formation['date_debut']);
    $date_fin = htmlspecialchars($formation['date_fin']);
    $lieu = htmlspecialchars($formation['lieu']);
    $contenu = htmlspecialchars($formation['contenu']);
    
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
?>