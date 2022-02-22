$(document).ready(function(){
    $("#add").click(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax.php',
            method:'POST',
            data:{'action':$('#add').val(), 'text':$("#new_task").val()},
            dataType:'JSON'
        }).done(function(response){
            display(response);
        });

    });
   
});


function display(response){
    html ="";
    for(var key in response){
     html +="<li><form method='get' action='' name='myform'><input type='checkbox' name='action' value='checkbox' onchange='form.submit()'><label>"+response[key]['text']+"</label><input type='submit' name='action' value='edit' class='edit'><input type='hidden' name='id' value='"+response[key]['id']+"'><input type='hidden' name='label' value='"+response[key]['status']+"'><input type='hidden' '><input type='submit' name='action' value='delete' class='delete'></form></li>";   
    }
    
    $("#incomplete-tasks").html(html);
}