$(document).off('click',('.delete, .add, .update'));
$(document).on('click','.delete',function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var type = $(this).data('type');
    $.ajax({
        method: "GET",
        url: "/ajax/tasks/ajax.php",
        dataType: "json",
        data: {
            'id': id,
            'type': type,
            'event': 'delete'
        },
        success: function(data) {
            if (data != 'Y') {
                alert(data);
            } else {
            $(`tr[data-row_id="${id}"][data-type="${type}"]`).remove();
                alert('Успешно');
            }
        },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    });
});

$(document).on('click','.add[data-type="task"]',function(e) {
    $.fancybox.open({
        type: 'ajax',		
        src: '/ajax/tasks/ajax_add_form_task.php' 
    });
    return false;
});
$(document).on('click','.add[data-type="exec"]',function(e) {
    $.fancybox.open({
        type: 'ajax',		
        src: '/ajax/tasks/ajax_add_form_exec.php' 
    });
    return false;
});
$(document).on('click','.update[data-type="task"]',function(e) {
    $.fancybox.open({
        type: 'ajax',		
        src: '/ajax/tasks/ajax_update_form_task.php' ,
        ajax: {
            settings : {
                data : {
                 'id': $(this).data('id'),
                 'type': 'task'
                }
            }
         }
    });
    return false;
});
$(document).on('click','.update[data-type="exec"]',function(e) {
    $.fancybox.open({
        type: 'ajax',		
        src: '/ajax/tasks/ajax_update_form_exec.php' ,
        ajax: {
            settings : {
                data : {
                 'id': $(this).data('id'),
                 'type': 'exec'
                }
            }
         }
    });
    return false;
});

