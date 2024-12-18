<?php
$data = yaml_parse_file("data/footer.yaml");

// Générer le footer
echo '<footer class="footer">';
    echo '<div class="footer-content">';
        echo '<p>&copy; 2024 Mon Portfolio</p>';
        echo '<div class="social-icons">';

        // Afficher les icônes de réseaux sociaux
        foreach ($data['socials'] as $social) {
            echo '<a href="' . htmlspecialchars($social['url']) . '" target="_blank" title="' . htmlspecialchars($social['platform']) . '">';
                echo '<img src="images/' . htmlspecialchars($social['icon']) . '" alt="' . htmlspecialchars($social['platform']) . '">';
            echo '</a>';
        }

        echo '</div>'; 
    echo '</div>'; 
echo '</footer>';
