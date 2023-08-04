<?php
	include('assets/php/Config.php');
    $checkPreset = array(1, 1);
	HeaderEcho(
        'Cadastrar', 
        [
            [0, 'http-equiv="X-UA-Compatible" content="IE=edge"'],
            [0, 'name="viewport" content="width=device-width, initial-scale=1.0"'],
            [1, 'assets/css/cad.css'],
            [2, 'assets/java/script.js'],
            [2, 'https://kit.fontawesome.com/39cab4bf95.js', 'crossorigin="anonymous"'],
            [2, 'https://code.jquery.com/jquery-3.2.1.slim.js', 'integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg=" crossorigin="anonymous"'],
        ],
        ''
    );
?>
    <body>
        <form method="post">
            <input type="text" name="nome" class="input" placeholder="digite seu nome aqui">
            <input type="email" name="email" class="input" placeholder="digite seu email aqui">
            <input type="password" name="RA" class="input" placeholder="Digite seu RA aqui">
            <input type="submit" name="enviar" class="submit">
        </form>
    </body>
<?php
    footEcho();
    if(isset($_POST['enviar'])){
        $Vls = array('"'.$_POST['nome'].'"', '"'.$_POST['email'].'"', '"'.$_POST['RA'].'"');
        $inf = array('info');
        $dt = array('NM_nome', 'EM_email', 'CH_ra');
        $Vers = array(1, 2);
        $Configs = array(array('OR'), 'ERROR'=>array('Email ou RM dos dados escritos, já está cadastrado!', 'erro em cadstrar'));
        $Up = array();
        
        $Cadastrado = InsertBd($inf, $dt, $Vls, $Vers, $Configs, $Up);

        //mensage('o '.$Cadastrado[1].' foi cadastrado com sucesso!');
    }
?>