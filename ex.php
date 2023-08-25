<?php
include('assets/php/Config.php');
$checkPreset = array(1, 1);

$tableName = $_GET['NameTb'];
$primaryKey = $_GET['cd'];
$primaryKeyName = $_GET['Key'];

$deleteResult = DeleteRowAndRelated($tableName, $primaryKeyName, $primaryKey);
if ($deleteResult) {
    mensage("Deletado com sucesso");
    Atalho('rel.php');
} else {
    mensage("erro");
    Atalho('rel.php');
}
?>