<?php
session_start();

include ("function.php");

$action = isset($_GET['action'])?$_GET['action']:'';

if(isset($_GET['action'])){
    $action =$_GET['action'];
    $list =$_GET['new-task'];
    $id =$_GET['id'];
    $status =$_GET['status'];

    $updateListItem = array('id'=> $id,'text'=> $list);

    $completeTaskId = $_GET['id'];

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


    
    print_r($_SESSION['complete']);
}

?>


<html>
    <head>
        <title>TODO List</title>
        <link href="style1.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h2>TODO LIST</h2>

            <h3>Add Item</h3>
            <p>
               <form method='get' action=""> 
                <input id="new-task" name='new-task' type="text" value ="<?php if(isset($getListItem)):echo $getListItem['text']?> <?php else:?> <?php endif?>" >
                <?php if(isset($getListItem['id'])):{?>
                    <input type="hidden" name="id" value=<?php echo $getListItem['id'] ?>>
                    <input type="submit" name="action" value="update">
                <?php
                }else:?>
                    <input type="submit" name="action" value="add">
                <?php endif ?>
                </form>
            </p>
    
            <h3>Todo</h3>
            <?php echo display()?>
            <h3>Completed</h3>
            <ul id="completed-tasks">
            <?php echo displayComplete()?>
            </ul>
        </div>
    
    </body>
</html>