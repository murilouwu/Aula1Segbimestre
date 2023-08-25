<?php
	include('assets/php/Config.php');
    $checkPreset = array(1, 1);
	HeaderEcho(
        'Relátório', 
        [
            [0, 'http-equiv="X-UA-Compatible" content="IE=edge"'],
            [0, 'name="viewport" content="width=device-width, initial-scale=1.0"'],
            [1, 'assets/css/Rel.css'],
            [2, 'assets/java/script.js'],
            [2, 'https://kit.fontawesome.com/39cab4bf95.js', 'crossorigin="anonymous"'],
            [2, 'https://code.jquery.com/jquery-3.2.1.slim.js', 'integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg=" crossorigin="anonymous"'],
        ],
        'assets/imgs/logo.png'
    );
?>
    <body>
        <?php
            $nameTb = 'info';
            $Dts = array('ID_inf','EM_email', 'NM_nome', 'CH_ra');
            
            $Result = GetTableDates($nameTb, $Dts);
            if ($Result) {
                echo '<div class="table">';
                foreach ($Result as $row) {
                    echo '
                        <div class="card">
                            <div class="perfil"></div>
                            <label class="Lb">'.$row['NM_nome'].'</label>
                            <label class="Lb">'.$row['EM_email'].'</label>
                            <label class="Lb">'.$row['CH_ra'].'</label>
                            <div class="btns">
                                <a class="btn excluir" href="ex.php?cd='.$row['ID_inf'].'&NameTb='.$nameTb.'&Key=ID_inf">Excluir</a>
                                <a class="btn" href="#">Modificar dado</a>
                            </div>
                        </div>
                    ';
                };
                echo '</div>';
            } else {
                echo '<h1 class="Mensage">Banco de dados Vasio</h1>';
            }
        ?>
    </body>
<?php
    footEcho();
?>