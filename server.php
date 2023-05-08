<?php

require_once('functions.php');

//RECUPERIAMO IL CONTENUTO DEL JSON
$database = file_get_contents(__DIR__ . '/todo-list.json'); // <---- STRINGA !!!

// TRASFORMIAMO IL JSON IN UN ARRAY ASSOCIATIVO 
$todo_list = json_decode($database, true); // <---- ARRAY ASSOCIATIVO !!!


// .........ELABORAZIONE DATI..............

//GESTIONE AGGIUNTA TODO
if (isset($_POST['add'])) {
    //operazione add
    $todo_list = addTodo($todo_list, $_POST);
}

//GESTIONE CANCELLAZIONE TODO
if (isset($_POST['delete'])) {
    //operazione add
    $todo_list = deleteTodo($todo_list, $_POST['delete']);
}

//GESTIONE MODIFICA DATI

if (isset($_POST['edit'])) {
    //operazione add
    $todo_list = editTodo($todo_list, $_POST);
}


// .........ELABORAZIONE DATI..............


// RESTITUIAMO I DATI JSON 

// DICIAMO ALLA PAGINA CHE SARA' UN JSON 
header('Content-Type: application/json');

// RITRASFORMIAMO L'ARRAY ASSOCIATIVO IN UNA STRINGA (JSON) E LA SCRIVIAMO A SCHERMO 
echo json_encode($todo_list); //  <---- STRINGA !!!