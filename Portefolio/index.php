<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/accueil.css" />
        <title>Portefolio</title>
    </head>
    <body>
        <nav>
    
        <?php 
            require_once("yaml/yaml.php");
            $data=yaml_parse_file("data/menu.yaml");
            echo"<div class='header'>";
                echo"<div class='image'>";
                echo"<img src='image/logo.png'/>";
                echo "</div>";
                echo"<div class='menunav'>";
                echo "<ul class=\"menu\" >";
                foreach($data["navigation"] AS $nav){
                    if ($nav["name"] == "Compétences") {
                        echo '<li><a href="#competences">Compétences</a></li>';
                    }
                    if ($nav["name"] == "Accueil") {
                        // Lien d'ancrage vers la section accueil
                        echo '<li><a href="#accueil">Accueil</a></li>';
                    } 
                    if ($nav["name"] == "Réalisations") {
                        // Lien d'ancrage vers la section accueil
                        echo '<li><a href="#accueil">Réalisations</a></li>';
                    } 
                    if ($nav["name"] == "Formation") {
                        // Lien d'ancrage vers la section accueil
                        echo '<li><a href="#accueil">Formation</a></li>';
                    } 
                    if ($nav["name"] == "Contact") {
                        // Lien d'ancrage vers la section accueil
                        echo '<li><a href="#formulaire">Contact</a></li>';
                    } 
                }
                echo "</ul>";
                echo "</div>";
                echo "</div>";
            
                echo "<img class='menu-image' src='image/accueil.gif' alt='Image d'accueil'>";
            ?>
        ?>


        </nav>
<?php 
    require_once("yaml/yaml.php");
    include("php/accueil.php");

?>

<?php 
    require_once("yaml/yaml.php");
    include("php/competences.php");

?>

<?php 
    require_once("yaml/yaml.php");
    include("php/realisation.php");

?>

<?php 
    require_once("yaml/yaml.php");
    include("php/formation.php");

?>

<?php 
    require_once("yaml/yaml.php");
    include("php/formulaire.php");

?>
   
    
    </body>
</html>