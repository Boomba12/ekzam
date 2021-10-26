<?php
use Bitrix\Main\Context, 
Ekzam\Tableoperation;

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$arExec = Tableoperation::getExecutors();
$arState = Tableoperation::getStates();
?>
<div class="wind" id="form">
    <div class="mb-3">
        <label class="form-label">Имя</label>
        <input type="text" class="form-control" name="NAME">
    </div>
    <div class="mb-3">
        <label class="form-label">Статус</label>
        <select class="form-select" aria-label="Статус" name="STATE">
            <?foreach($arState as $key => $state):?>
                <option value="<?=$key?>"><?=$state['NAME']?></option>
            <?endforeach;?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Исполнитель</label>
        <select class="form-select" aria-label="Исполнитель" name="EXECUTOR">
            <?foreach($arExec as $key => $exec):?>
                <option value="<?=$key?>"><?=$exec['NAME']?></option>
            <?endforeach;?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Описание</label>
        <input type="text" class="form-control" name="DESCRIPTION">
    </div>
    <button id="task_add_button" class="btn btn-primary">Добавить</button>
</div>

<script>
    $(document).ready(function() {
        $('#task_add_button').click(function(e) {
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
                    'type': 'task',
                    'event': 'add',
                    'data': $data
                },
                success: function(data) {
                    var newRow = $(`<tr class='table' data-row_id='${data['ID']}' data-type='task'></tr>`)
                        .append(`<th scope='row' class='exec-id'>${data['ID']}</th>`)
                        .append(`<td class='task-name'>${data['NAME']}</td>`)
                        .append(`<td class='task-state' data-exec_id='${data['STATE']}'>${data['STATE_NAME']}</td>`)
                        .append(`<td class='task-executor' data-exec_id='${data['EXECUTOR']}'>${data['EXECUTOR_NAME']}</td>`)
                        .append(`<td class='task-descr'>${data['DESCRIPTION']}</td>`)
                        .append(`<td class='task-buttons'></td>`);
                        $(newRow).find('.task-buttons').append(`<button type='button' class='btn btn-primary delete' data-id='${data['ID']}' data-type='task'>Удалить</button>`)
                        .append(' ')
                        .append(`<button type='button' class='btn btn-primary update' data-id='${data['ID']}' data-type='task'>Редактировать</button>`);
                    $('#task_body').append(newRow); 
                    $.fancybox.close();
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        })
    });
</script>