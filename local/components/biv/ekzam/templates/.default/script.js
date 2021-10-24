$(document).ready(function() {
    $('.delete').click(function(e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/ajax/tasks/ajax_form.php",
            dataType: "json",
            data: {
                'id': $(this).data('id'),
                'type': $(this).data('type'),
                'event': 'delete'
            },
            success: function(data) {
                console.log(data);
                $('body').append(data);/*
            	$('.tab-container').css({"display":"flex"});
            	$('.modal .fade').fadeIn();*/
                var myModal = new jBox ( 'Modal' ,  { 
                    attach :  '#deleteElement' ,  
                  } ) ;
                myModal.open();
            },
        });
    })
});

$(document).ready(function() {
    $('.add').click(function(e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/ajax/tasks/ajax_form.php",
            dataType: "json",
            data: {
                'id': $(this).data('id'),
                'type': $(this).data('type'),
                'event': 'add'
            },
            success: function(data) {
                console.log(data);
                $('body').append(data);
            	$('.tab-container').css({"display":"flex"});
            	$('.modal .fade').fadeIn();
            },
        });
    })
});

$(document).ready(function() {
    $('.update').click(function(e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/ajax/tasks/ajax_form.php",
            dataType: "json",
            data: {
                'id': $(this).data('id'),
                'type': $(this).data('type'),
                'event': 'update'
            },
            success: function(data) {
                console.log(data);
                $('body').append(data);
            	$('.tab-container').css({"display":"flex"});
            	$('.modal .fade').fadeIn();
            },
        });
    })
});
$(document).ready(function() {
    $('.cancel').click(function(e) {
       $('#deleteElement').remove();
    })
});

$(document).ready(function() {
    $('.test').click(function(e) {
     /*   e.preventDefault();
        console.log($(this).data('id'));
        console.log($(this).data('type'));
        $.ajax({
            method: "POST",
            url: "/ajax/tasks/ajax.php",
            dataType: "json",
            data: {
                'id': $(this).data('id'),
                'type': $(this).data('type'),
                'event': 'delete'
            },
            success: function(data) {
                alert('Успешно');
            },
        });*/

    })
});

