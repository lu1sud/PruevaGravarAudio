

    <h1 class="title">Listado de Audios</h1>

    <ul class="audio__container">
        <?php
        $audioDir = 'uploads/';

        if (is_dir($audioDir)) {
            $audioFiles = scandir($audioDir);

            if (count($audioFiles) <= 2) {
                echo '<p>No existen audios disponibles.</p>';
            } else {
                foreach ($audioFiles as $file) {
                    if ($file != '.' && $file != '..') {
                        $fileName = pathinfo($file, PATHINFO_FILENAME);
                        echo '<li>';
                        echo '<audio controls><source src="' . $audioDir . $file . '" type="audio/mpeg"></audio>';
                        echo '<p>' . $fileName . '</p>';
                        echo '</li>';
                    }
                }
            }
        } else {
            echo '<p>La carpeta de audios no existe.</p>';
        }
        ?>

    </ul>
    
    <script src="script.js"></script>
