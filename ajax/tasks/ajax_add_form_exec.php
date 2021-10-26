<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
?>
<div class="wind" id="form">
        <div class="mb-3">
            <label class="form-label">Имя</label>
            <input type="text" class="form-control" name='NAME'>
        </div>
        <div class="mb-3">
            <label class="form-label">Должность</label>
            <input type="text" class="form-control" name='POSITION'>
        </div>
        <button id="exec_add_button" class="btn btn-primary">Добавить</button>
</div>

<script>
    $(document).ready(function() {
        $('#exec_add_button').click(function(e) {
            e.preventDefault();
            var $data = {};
            $('#form').find ('input, select').each(function() {
                $data[this.name] = $(this).val();
            });
            $.ajax({
                method: "GET",
                url: "/ajax/tasks/ajax.php",
                dataType: "json",
                data: {
                    'type': 'exec',
                    'event': 'add',
                    'data': $data
                },
                success: function(data) {
                    var newRow = $(`<tr class='table' data-row_id='${data['ID']}' data-type='exec'></tr>`)
                        .append(`<th scope='row' class='exec-id'>${data['ID']}</th>`)
                        .append(`<td class='exec-name'>${data['NAME']}</td>`)
                        .append(`<td class='exec-position'>${data['POSITION']}</td>`)
                        .append(`<td class='exec-buttons'></td>`);
                        $(newRow).find('.exec-buttons').append(`<button type='button' class='btn btn-primary delete' data-id='${data['ID']}' data-type='exec'>Удалить</button>`)
                        .append(' ')
                        .append(`<button type='button' class='btn btn-primary update' data-id='${data['ID']}' data-type='exec'>Добавить</button>`);
                    $('#exec_body').append(newRow); 
                    $.fancybox.close();
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        })
    });
</script>