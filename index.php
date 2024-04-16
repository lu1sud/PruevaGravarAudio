<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


    <title>Document</title>
</head>
<body>
    
    <div class="container__micro">
        <div class="border__micro">
            <div class="content__micro">
                <i class='bx bx-microphone icon'></i>
            </div>
        </div>
    </div>
    <div> Cuando termine de gravar recargue la pagina</div>
    <div>
        <?php
            require_once('./php/MostrarAudios.php');
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>