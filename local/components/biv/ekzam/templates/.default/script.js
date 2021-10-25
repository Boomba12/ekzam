$(document).ready(function() {
    $('.delete').click(function(e) {
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
                alert('Успешно');
                $(`tr[data-row_id="${id}"][data-type="${type}"]`).remove();
            },
            error: (error) => {
                console.log(JSON.stringify(error));
            }
        });
    })

    $('.test').click(function(e) {
        $.fancybox.open({
            type: 'ajax',		
            src: '/ajax/tasks/ajax_test.php',
            ajax: {
               settings : {
                   data : {
                    'type': 'task',
                    'event': 'delete'
                   }
               }
            }
        });
        return false;
    })

    $('.add[data-type="task"]').click(function(e) {
        $.fancybox.open({
            type: 'ajax',		
            src: '/ajax/tasks/ajax_add_form_task.php' 
        });
        return false;
    })
    $('.add[data-type="exec"]').click(function(e) {
        $.fancybox.open({
            type: 'ajax',		
            src: '/ajax/tasks/ajax_add_form_exec.php'
        });
        return false;
    })

    $('.update[data-type="task"]').click(function(e) {
        $.fancybox.open({
            type: 'ajax',		
            src: '/ajax/tasks/ajax_update_form_task.php',
            ajax: {
               settings : {
                   data : {
                    'id': $(this).data('id'),
                    'type': 'task'
                   }
               }
            }
        });
       // return false;
    })

    $('.update[data-type="exec"]').click(function(e) {
        $.fancybox.open({
            type: 'ajax',		
            src: '/ajax/tasks/ajax_update_form_exec.php',
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
    })
});
