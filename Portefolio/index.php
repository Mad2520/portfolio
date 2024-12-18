<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="css/accueil.css">
</head>
<body>

    <!-- Header Section avec logo et navigation -->
    <header>
        <div class="header">
            <div class="image">
                <img src="image/logo.png" alt="Logo Portfolio">
            </div>
            <nav class="menunav">
                <ul class="menu">
                    <?php 
                        require_once("yaml/yaml.php");
                        $data = yaml_parse_file("data/menu.yaml");
                        
                        // Affichage des liens de navigation
                        foreach ($data["navigation"] as $nav) {
                            switch ($nav["name"]) {
                                case "Accueil":
                                    echo '<li><a href="#accueil">Accueil</a></li>';
                                    break;
                                case "Compétences":
                                    echo '<li><a href="#competences">Compétences</a></li>';
                                    break;
                                case "Réalisations":
                                    echo '<li><a href="#realisations">Réalisations</a></li>';
                                    break;
                                case "Formation":
                                    echo '<li><a href="#formations">Formation</a></li>';
                                    break;
                                case "Contact":
                                    echo '<li><a href="#formulaire">Contact</a></li>';
                                    break;
                            }
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Image d'accueil -->
    <section class="menu-image-section">
        <img class="menu-image" src="image/accueil.gif" alt="Image d'accueil">
    </section>

    <!-- Section Accueil -->
    <main>
        <?php include("php/accueil.php"); ?>
    </main>

    <!-- Section Compétences -->
    <section id="competences">
        <?php include("php/competences.php"); ?>
    </section>

    <!-- Section Réalisations -->
    <section id="realisations">
        <?php include("php/realisation.php"); ?>
    </section>

    <!-- Section Formation -->
    <section id="formations">
        <?php include("php/formation.php"); ?>
    </section>

    <!-- Section Contact -->
    <section id="formulaire">
        <?php include("php/formulaire.php"); ?>
    </section>

    <!-- Footer Section -->
    <footer>
        <?php include("php/footer.php"); ?>
    </footer>
   
</body>
</html>
