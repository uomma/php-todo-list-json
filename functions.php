<?php
//funzione per agiungere todo
function addTodo($todo_list, $params)
{
    $backup_todo_list = $todo_list;

    $todo = [
        'text' => $params['todo'],
        'done' => false,
    ];


    $todo_list[] = $todo;

    //salvo i nuovi dati dentro  todo-list.json nel file di db todo  e json_encode sovrascrive i nuovi valori dentro todo-list
    saveFile( '/todo-list.json', json_encode( $backup_todo_list), json_encode($todo_list));

    return $todo_list;
}



//funzione per eliminare todo

function deleteTodo($todo_list, $i){
    $backup_todo_list = $todo_list;


    unset($todo_list[$i]);
    //salvo i nuovi dati dentro  todo-list.json nel file di db todo  e json_encode sovrascrive i nuovi valori dentro todo-list
    saveFile( '/todo-list.json', json_encode( $backup_todo_list), json_encode($todo_list));

    return $todo_list;
}



function editTodo($todo_list, $params){

    $backup_todo_list = $todo_list;

    $i = $params['edit'];
    //nella todolist in posizione i si andrà a sostituire con un nuovo array che dentro ha un text con il param che gli stiamo passando e il done false
    $todo_list[$i] = array(
        'text' => $params['text'],
        'done' => false
    );
    //salvo i nuovi dati dentro  todo-list.json nel file di db todo  e json_encode sovrascrive i nuovi valori dentro todo-list
    saveFile( '/todo-list.json', json_encode( $backup_todo_list), json_encode($todo_list));

    return $todo_list;
}



function saveFile ($file, $old_data = NULL, $new_data = NULL){

    
    if($old_data != NULL){
        $filename = __DIR__.date("YmdHis").'-'.$file;
        file_put_contents($filename, $old_data);
    };      


    if($new_data != NULL){
        $filename =__DIR__.'/'.$file;
        file_put_contents($filename, $new_data);

    }
}