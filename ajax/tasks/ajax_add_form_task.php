<?php
use Bitrix\Main\Context, 
Ekzam\Tableoperation;

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$arExec = Tableoperation::getExecutor();
$arState = Tableoperation::getState();
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
                    alert('Успешно добавлено');
                    $.fancybox.close();
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        })
    });
</script>