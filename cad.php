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
        'assets/imgs/logo.png'
    );
?>
    <body>
        <form class="frm" method="post">
            <div class="boxForm">
                <h1 class="title">Adicionar Pessoa</h1>
                <div class="inputs">
                    <div class="input">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="nome" placeholder="Digite o Nome aqui" class="inputtext" maxlength="200">
                    </div>
                    <div class="input">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="Digite o Email aqui" class="inputtext" maxlength="200">
                    </div>
                    <div class="input">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="RA" pattern="[0-9]{5}" placeholder="Digite o RA de 5 digitos" class="inputtext" maxlength="5" minlength="5">
                    </div>
                </div>
                <input type="submit" name="enviar" value="Adicionar" class="inputSub">
            </div>
        </form>
    </body>
<?php
    footEcho();
    if(isset($_POST['enviar'])){
        $Vls = array('"'.$_POST['nome'].'"', '"'.$_POST['email'].'"', ''.$_POST['RA'].'');
        $inf = array('info');
        $dt = array('NM_nome', 'EM_email', 'CH_ra');
        $Vers = array(1, 2);
        $Configs = array(array('OR'), 'ERROR'=>array('Email ou RM dos dados escritos, já está cadastrado!', 'erro em cadstrar'));

        $Cadastrado = InsertBd($inf, $dt, $Vls, $Vers, $Configs);
        mensage($Cadastrado);
    }
?>