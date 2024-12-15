<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/accueil.css" />
        <title>Portefolio</title>
    </head>
    <body>
        <nav>
            <?php 
                // Inclure le fichier yaml pour récupérer les données du menu
                $data = yaml_parse_file("data/menu.yaml");
                echo "<div class='header'>";
                    echo "<div class='image'>";
                        echo "<img src='image/logo.png' alt='Logo' />";
                    echo "</div>";
                    echo "<div class='menunav'>";
                        echo "<ul class='menu'>";
                        foreach ($data["navigation"] as $nav) {
                            if ($nav["name"] == "Compétences") {
                                echo '<li><a href="#competences">Compétences</a></li>';
                            } elseif ($nav["name"] == "Accueil") {
                                echo '<li><a href="#accueil">Accueil</a></li>';
                            } elseif ($nav["name"] == "Réalisations") {
                                echo '<li><a href="#realisations">Réalisations</a></li>';
                            } elseif ($nav["name"] == "Formation") {
                                echo '<li><a href="#formation">Formation</a></li>';
                            } elseif ($nav["name"] == "Contact") {
                                echo '<li><a href="#formulaire">Contact</a></li>';
                            }
                        }
                        echo "</ul>";
                    echo "</div>";
                echo "</div>";
                echo "<img class='menu-image' src='image/accueil.gif' alt='Image d'accueil' />";
            ?>
        </nav>

        <?php 
            // Inclure les fichiers PHP correspondant aux sections
            include("php/accueil.php");      // Section Accueil
            include("php/competences.php");  // Section Compétences
            include("php/realisation.php");  // Section Réalisations
            include("php/formation.php");    // Section Formation
            include("php/formulaire.php");   // Section Contact
        ?>
    </body>
</html>

