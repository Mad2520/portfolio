<?php
$data = yaml_parse_file("data/realisation.yaml");
echo '<h2 class="section-titre">Mes Réalisations</h2>';
echo '<div class="realisation-container">';

foreach ($data['realisations'] as $realisation) {
    $titre = htmlspecialchars($realisation['titre']);
    $description = htmlspecialchars($realisation['description']);
    $illustration = htmlspecialchars($realisation['illustration']);
    $lien_github = htmlspecialchars($realisation['lien_github']);
    $gif_background = htmlspecialchars($realisation['gif_background']);
    $lien_procedure = htmlspecialchars($realisation['lien_procedure']);

    echo '<section class="realisation-section">';
    echo '<article class="realisation-titre"><h3>' . $titre . '</h3></article>';
    echo '<article class="realisation-content">';
    echo '<div class="realisation-card" style="--gif-background: url(' . $gif_background . ');">';
    echo '<a href="' . $lien_github . '" target="_blank">';
    echo '<img src="' . $illustration . '" alt="' . $titre . '" class="realisation-img">';
    echo '</a>';
    echo '<p class="realisation-description">' . $description . '</p>';
    echo '<a href="' . $lien_procedure . '" class="btn-procedure" target="_blank">Cliquez ici pour voir la procédure</a>';
    echo '</div>';
    echo '</article>';
    echo '</section>';
}

echo '</div>';
?>
