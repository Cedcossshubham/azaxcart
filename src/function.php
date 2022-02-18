<?php
 
//added task to task array
function newTask($list){
        $tasks = isset($_SESSION['tasks'])?$_SESSION['tasks']:array();
        $task =array('id'=>rand(10,1000000000),"text"=>$list,"status"=>"unchecked");
        array_push($tasks,$task);
        $_SESSION['tasks']= $tasks;   
}


function display(){
    $tasks = isset($_SESSION['tasks'])?$_SESSION['tasks']:array();
    $html ="";
    if(sizeof($tasks)){
        foreach($tasks as $key => $task){
            $html .="<li><form method='get' action='' name='myform'><input type='checkbox' name='action' value='checkbox' onchange='form.submit()'><label>".$task['text']."</label><input type='submit' name='action' value='edit' class='edit'><input type='hidden' name='id' value='".$task['id']."'><input type='hidden' name='label' value='".$task['status']."'><input type='hidden' '><input type='submit' name='action' value='delete' class='delete'></form></li>";
        }
        $html .= '</ul>';
    }
    return $html;
 }



function deleteTask($id,$status){
    
    $complete =  isset($_SESSION['complete'])?$_SESSION['complete']:array();
   
   
    if($status=="unchecked"){
        $tasks = isset($_SESSION['tasks'])?$_SESSION['tasks']:array();
        foreach($tasks as $key=>$task){
            if($id==$task['id']){
                unset($tasks[$key]);
                $_SESSION['complete'] = $tasks;
            }
        }
    }
    
    
    
    
    foreach($tasks as $key=>$task){
        if($id==$task['id']){
            unset($tasks[$key]);
            $_SESSION['tasks'] = $tasks;
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
            
       }
    }
}


//mark complete
function markCompleted($completeTaskId){
    $tasks = isset($_SESSION['tasks'])?$_SESSION['tasks']:array();
    $complete =  isset($_SESSION['complete'])?$_SESSION['complete']:array();

    $id =$completeTaskId;
    foreach($tasks as $key=>$task){
        if($task['id']==$completeTaskId){
            $check =array('id'=>$completeTaskId,"text"=>$task['text'],"status"=>"checked");
            array_push($complete,$check);
            $_SESSION['complete'] = $complete;    
            deleteTask($id);     
        }

    }
}


function displayComplete(){
    $tasks = isset($_SESSION['complete'])?$_SESSION['complete']:array();
    $html ="";
    if(sizeof($tasks)){
        foreach($tasks as $key => $task){
            $html .="<li><form method='get' action='' name='myform'><input type='checkbox' name='action' value='checkbox' onchange='form.submit()'><label>".$task['text']."</label><input type='submit' name='action' value='edit' class='edit'><input type='hidden' name='id' value='".$task['id']."'><input type='hidden' name='label' value='".$task['status']."'><input type='hidden' '><input type='submit' name='action' value='delete' class='delete'></form></li>";
        }
        $html .= '</ul>';
    }
    return $html;
}


function deleteCompleteTask($id){
    $tasks = isset($_SESSION['complete'])?$_SESSION['complete']:array();
    
    foreach($tasks as $key=>$task){
        if($id==$task['id']){
            unset($tasks[$key]);
            $_SESSION['complete'] = $tasks;
        }
    }
   
}


?>