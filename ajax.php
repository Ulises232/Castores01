<?php
ob_start();
date_default_timezone_set("America/Mexico_City");
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}

if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'update_user'){
	$save = $crud->update_user();
	if($save)
		echo $save;
}
if($action == 'user_archivar'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}


/* NOTICIAS  */

if ($action == 'noticia_guardar') {
	$save = $crud->noticia_guardar();
	if ($save)
		echo $save;
}
if ($action == 'noticia_archivar') {
	$save = $crud->noticia_archivar();
	if ($save)
		echo $save;
}

if ($action == 'comentario_guardar') {
	$save = $crud->comentario_guardar();
	if ($save)
		echo $save;
}

if ($action == 'sub_comentario_guardar') {
	$save = $crud->sub_comentario_guardar();
	if ($save)
		echo $save;
}

/* FIN NOTICIAS */


ob_end_flush();
