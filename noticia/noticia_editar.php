<?php
include 'db_connect.php';
$id = explode("/", $_GET['page'])[2];
$qry = $conn->query("SELECT * FROM noticias where id_noticia = ".$id)->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'noticia_nueva.php';
?>