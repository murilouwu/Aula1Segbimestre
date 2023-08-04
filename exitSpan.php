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
        ''
    );
?>
    <body>
        <div class="span">
            <a href="index.php" class="exit"><i class="fa-brands fa-xbox" style="margin-right: 0px;"></i></a>
            <i class="emoji fa-regular fa-face-flushed"></i>
            <p class="info">Oh não, você não poide sair!!!</p>
        </div>
    </body>
<?php
    footEcho();
?>