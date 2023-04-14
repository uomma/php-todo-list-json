<?php

require_once(__DIR__.'/functions.php');

$database  = file_get_contents(__DIR__ .'/todo-list.json'); //=>questa è una STRINGA!!!

// con _DECODE trasformiamo la stringa (non era altro che una stringa di codice)[todo-list.json] in un array associativo!!
$todo_list =json_decode($database, true);



if(isset($_POST['add'])){

$todo_list = addTodo($todo_list, $_POST);
}

if(isset($_POST['delete'])){
    $todo_list =deleteTodo($todo_list, $_POST['delete']);
}

if(isset($_POST['edit'])){
    $todo_list = editTodo( $todo_list, $_POST);
}










//usiamo HEADER per dire al browser  che il tipo di contenuto non è text.html ma di tipo application json
header('Content-Type: application/json');
//con ENCODE possiamo andare a modificare il contenuto di todo-list
echo json_encode($todo_list);



?>