<?php
session_start();
include('function.php');
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
                <form method='POST' action=""> 
                    <input id="new_task" name='new_task' type="text" value ="<?php if(isset($getListItem)):echo $getListItem['text']?> <?php else:?> <?php endif?>" >
                    <?php if(isset($getListItem['id'])):{?>
                        <input type="hidden" name="id" value=<?php echo $getListItem['id'] ?>>
                        <input type="submit" name="action" value="update">
                    <?php
                    }else:?>
                        <input type="submit" id='add' name="action" value="add">
                    <?php endif ?>
                </form>
            </p>
    
            <h3>Todo</h3>
            <ul id="incomplete-tasks">
              
            </ul>
            <h3>Completed</h3>
            <ul id="completed-tasks">
               
            </ul>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='script.js'></script>
</body>
</html>