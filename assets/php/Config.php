<?php
session_start();
include('PhpMain.php'); //funcão amais como o Mensage

//configure o banco no http://localhost/phpmyadmin
$db = array(
    'host'=>'localhost',
    'user'=>'root',
    'pass'=> '',
    'nm'=>'AULAONE'
);

$conn = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['nm']) or die ('Sem Conecção ao database');

function InsertBd($Infs, $Dts, $Vls, $Vers, $Configs, $Up){
    /*
        $Infs = array('nm_table', );
        $Dts = array('date1', 'date2', ...); 
        $Vls = array('insert_value1','insert_value2'...); if isset(file){ $Vls = array('insert_value1', 'insert_value2', ...['fileName0','fileName1','fileName2',...]); }
        $Vers = array(0, 1, 2..); key from var Dts
        $Configs = array(array('OR ou AND 0', 'OR ou AND 1'...), 'ERROR'=>array('erro1', 'erro2', ..), 'FilesPast'=>array('FilePastSave0','FilePastSave1', ...));
        $Up = array($file0, $file1...);
    */
    $VersToText = '';
    foreach ($Vers as $key => $ver) {
        if ($key === 0) {
            $VersToText .= $Dts[$ver] . '= ' . $Vls[$ver];
        } else {
            $VersToText .= ' ' . $Configs[0][$key - 1] . ' ' . $Dts[$ver] . '= ' . $Vls[$ver];
        }
    }
    $query = 'SELECT * FROM ' . $Infs[0] . ' WHERE ' . $VersToText.";";
    $res = $GLOBALS['conn']->query($query);
    $rows = mysqli_num_rows($res);
    if($rows > 0){
        mensage($Configs['ERROR'][0]);
        return '';
    }else if($rows <= 0){
        if (count($Up) > 0) {
            $NewLinkFiles = upFileinPage($Up, $Configs['FilesPast']);
            $Vls[count($Vls) - 1] = $NewLinkFiles;
        }
        $DtsToText = implode(', ', $Dts);
        $VlsToText = '';
        foreach ($Vls as $key => $vl) {
            if ($key === (count($Vls)- 1)) {
                $VlsToText .= $vl;
            } else {
                $VlsToText .= $vl.', ';
            }
        }

        $query = 'INSERT INTO ' . $Infs[0] . ' ( ' . $DtsToText . ' ) VALUES ( ' . $VlsToText . ' )';
        $res = $GLOBALS['conn']->query($query);
        
        if(!$res){
            return GetBd($Infs, $Dts, $Vls);
        } else {
            mensage($Configs['ERROR'][1]);
            return '';
        }
    }
}

function GetBd($Infs, $Dts, $Vls) {
    $query = 'SELECT ';

    if (empty($Dts)) {
        $query .= '* ';
    } else {
        $query .= implode(', ', $Dts) . ' ';
    }

    $query .= 'FROM ' . $Infs[0] . ' WHERE ';

    $conditions = array();
    foreach ($Dts as $dt) {
        $conditions[] = $dt . " = '" . $Vls[$dt] . "'";
    }
    
    $query .= implode(' AND ', $conditions);
    echo $query;
    $res = $GLOBALS['conn']->query($query);
    
    if($res){
        $result = array();

        while ($row = mysqli_fetch_assoc($res)) {
            $result[] = $row;
        }
        
        return $result;
    }
}


?>