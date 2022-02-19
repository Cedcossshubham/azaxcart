<?php
 
//added task to task array
function newTask($list){
        $tasks = isset($_SESSION['tasks'])?$_SESSION['tasks']:array();
        $task =array('id'=>rand(10,1000000000),"text"=>$list,"status"=>0);
        array_push($tasks,$task);
        $_SESSION['tasks']= $tasks;   
}



function display(){
    $tasks = isset($_SESSION['tasks'])?$_SESSION['tasks']:array();
    $html ="";
    if(sizeof($tasks)){
       
        foreach($tasks as $key => $task){
            if($task['status']==0){
            $html .="<li><form method='get' action='' name='myform'><input type='checkbox' name='action' value='checkbox' onchange='form.submit()'><label>".$task['text']."</label><input type='submit' name='action' value='edit' class='edit'><input type='hidden' name='id' value='".$task['id']."'><input type='hidden' name='label' value='".$task['status']."'><input type='hidden' '><input type='submit' name='action' value='delete' class='delete'></form></li>";
            }
        }
        $html .= '</ul>';
    }
    return $html;
 }



function deleteTask($id){ 
 $tasks = isset($_SESSION['tasks'])?$_SESSION['tasks']:array();
        foreach($tasks as $key=>$task){
            if($id==$task['id']){
                unset($tasks[$key]);
                $_SESSION['tasks'] = $tasks;
                break;
            }
        }
}
    
    
function getEditTaskId($id){
    $tasks = isset($_SESSION['tasks'])?$_SESSION['tasks']:array();
    foreach($tasks as $key=>$task){
       if($id==$task['id']){
           return $task;
       }
    }
}


function updateListItem($updateListItem){
    $tasks = isset($_SESSION['tasks'])?$_SESSION['tasks']:array();;
    foreach($tasks as $key=>$task){
       if($task['id']==$updateListItem['id']){
            $tasks[$key]['text']= $updateListItem['text'];
            $_SESSION['tasks'] = $tasks; 
            break;     
       }
    }
}


//mark complete
function markCompleted($completeTaskId){
    $tasks = isset($_SESSION['tasks'])?$_SESSION['tasks']:array();

    foreach($tasks as $key=>$task){
        if($task['id']==$completeTaskId){
            if($task['status']==0){
                $tasks[$key]['status'] = 1;
            }
            else{
                $tasks[$key]['status'] = 0;
            }
            $_SESSION['tasks']=$tasks;
            break;
        }
    }
   
}


function displayComplete(){
    $tasks = isset($_SESSION['tasks'])?$_SESSION['tasks']:array();
    $html ="";
    if(sizeof($tasks)){
        foreach($tasks as $key => $task){
            if($task['status']==1){
                $html .="<li><form method='get' action='' name='myform'><input type='checkbox' name='action' value='checkbox' onchange='form.submit()'><label>".$task['text']."</label><input type='submit' name='action' value='edit' class='edit'><input type='hidden' name='id' value='".$task['id']."'><input type='hidden' name='label' value='".$task['status']."'><input type='hidden' '><input type='submit' name='action' value='delete' class='delete'></form></li>";
            }
        }
        $html .= '</ul>';
    }
    return $html;
}


?>