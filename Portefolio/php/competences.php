<?php

$data = yaml_parse_file("data/competences.yaml");

$titre = htmlspecialchars($data['titre']); 

// Affichage du titre
echo '<h2 class="comp-titre">' . $titre . '</h2>';

// Vérification si les compétences sont présentes
if (!empty($data['competences'])) {
    // Section contenant la frise chronologique des compétences
    echo '<section id="competences" class="frise_chronologique">';
    
    // Boucle sur chaque domaine de compétence
    foreach ($data['competences'] as $domaine) {
        // Escape du nom du domaine pour sécuriser l'affichage
        $domaine_nom = htmlspecialchars($domaine['domaine']);
        
        // Génération de la classe CSS pour chaque domaine (remplacement des espaces par des tirets)
        $domaine_class = strtolower(str_replace(' ', '-', $domaine_nom)); 

        // Bloc pour chaque domaine avec la classe spécifique
        echo '<div class="frise ' . $domaine_class . '">';
            
            // Lien pour le domaine
            echo '<a href="#" class="domaine-titre">' . $domaine_nom . '</a>'; 

            // Conteneur pour les items de ce domaine
            echo '<div class="texte">'; 

            // Parcourir les items du domaine
            foreach ($domaine['items'] as $item) {
                // Escape du nom de l'item pour sécuriser l'affichage
                $nom = htmlspecialchars($item['nom']);
                
                // Conversion du niveau en entier
                $niveau = intval($item['niveau']); 

                // Bloc de l'item avec le nom et les étoiles pour la notation
                echo '<div class="item">';
                    
                    // Nom de l'item
                    echo '<h1 class="item-nom">' . $nom . '</h1>'; 

                    // Conteneur pour les étoiles représentant le niveau de compétence
                    echo '<div class="etoiles">';
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $niveau) {
                            echo '<span class="etoile pleine">★</span>'; // Étoile pleine si le niveau est atteint
                        } else {
                            echo '<span class="etoile vide">☆</span>'; // Étoile vide sinon
                        }
                    }
                    echo '</div>'; 

                echo '</div>'; 
            }

            echo '</div>'; 
        echo '</div>'; 
    }

    echo '</section>'; 
}
?>
