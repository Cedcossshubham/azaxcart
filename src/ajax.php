<?php
include ("function.php");
session_start();

//echo json_encode($_REQUEST);
echo json_encode($_SESSION['tasks']);

if(isset($_REQUEST['action'])){
    $action =$_REQUEST['action'];
    $list =$_REQUEST['text'];
    $id =$_REQUEST['id'];
    $status =$_REQUEST['status'];

    $updateListItem = array('id'=> $id,'text'=> $list);

    $completeTaskId = $_REQUEST['id'];

    switch($action){
        case 'add': newTask($list);
        break;
        case 'delete': deleteTask($id);
        break;
        case 'edit': $getListItem = getEditTaskId($id);
        break;
        case 'update': updateListItem($updateListItem);
        break;
        case 'checkbox': markCompleted($completeTaskId);
        break;
    }

}



