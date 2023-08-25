<?php
	include('assets/php/Config.php');
    $checkPreset = array(1, 1);
	HeaderEcho(
        'Home', 
        [
            [0, 'http-equiv="X-UA-Compatible" content="IE=edge"'],
            [0, 'name="viewport" content="width=device-width, initial-scale=1.0"'],
            [1, 'assets/css/index.css'],
            [2, 'assets/java/script.js'],
            [2, 'https://kit.fontawesome.com/39cab4bf95.js', 'crossorigin="anonymous"'],
            [2, 'https://code.jquery.com/jquery-3.2.1.slim.js', 'integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg=" crossorigin="anonymous"'],
        ],
        'assets/imgs/logo.png'
    );
?>
    <body>
        <h1 class="titleMain"><i class="fa-solid fa-landmark"></i>Menu</h1>
        <div class="mainOperation">
            <a href="cad.php"><i class="fa-solid fa-pen-to-square"></i>Cadastrar</a>
            <a href="rel.php"><i class="fa-solid fa-toilet-paper"></i>Relátorio</a>
            <a href="exitSpan.php"><i class="fa-brands fa-xbox"></i>Sair</a>
        </div>
    </body>
<?php
    footEcho();
?>