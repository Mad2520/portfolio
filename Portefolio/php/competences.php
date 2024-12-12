<?php
$data = yaml_parse_file("data/competences.yaml");

$titre = htmlspecialchars($data['titre']); 

echo '<h2 class="comp-titre">' . $titre . '</h2>';

if (!empty($data['competences'])) {
    echo '<section id="competences" class="frise_chronologique">';
    foreach ($data['competences'] as $domaine) {
        $domaine_nom = htmlspecialchars($domaine['domaine']);
        $domaine_class = strtolower(str_replace(' ', '-', $domaine_nom)); // Convertir le nom en classe CSS

        echo '<div class="frise ' . $domaine_class . '">';
        echo '<a href="#" class="domaine-titre">' . $domaine_nom . '</a>'; // Lien pour le domaine
        echo '<div class="texte">'; // Texte contenant les items

        foreach ($domaine['items'] as $item) {
            $nom = htmlspecialchars($item['nom']);
            $niveau = intval($item['niveau']); // Récupérer le niveau sous forme de nombre (par exemple, de 1 à 5)

            echo '<div class="item">';
            echo '<h1 class="item-nom">' . $nom . '</h1>'; // Nom de l'item

            // Génération des étoiles en fonction du niveau
            echo '<div class="etoiles">';
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $niveau) {
                    echo '<span class="etoile pleine">★</span>'; // Étoile pleine
                } else {
                    echo '<span class="etoile vide">☆</span>'; // Étoile vide
                }
            }
            echo '</div>'; // Fermeture de la div .etoiles

            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
    }
    echo '</section>';
}
?>
