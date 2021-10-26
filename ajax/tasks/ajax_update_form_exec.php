<?php
use Bitrix\Main\Context,
    Ekzam\Tablestateoperation,
    Ekzam\Tableexecoperation, 
    Ekzam\Tabletaskoperation;

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$request = Context::getCurrent()->getRequest();
$id = $request->get('id');
$arResult = Tableexecoperation::getFields($id);
?>
<div class="wind" id="form">
        <div class="mb-3">
            <label class="form-label">Имя</label>
            <input type="text" class="form-control" name='NAME' value='<?=$arResult['UF_NAME_EXECUTOR']?>'>
        </div>
        <div class="mb-3">
            <label class="form-label">Должность</label>
            <input type="text" class="form-control" name='POSITION' value='<?=$arResult['UF_POSITION_EXECUTOR']?>'>
        </div>
        <button id="exec_update_button" class="btn btn-primary">Обновить</button>
</div>

<script>
    $(document).ready(function() {
        $('#exec_update_button').click(function(e) {
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
                    'id': <?=$id?>,
                    'type': 'exec',
                    'event': 'update',
                    'data': $data
                },
                success: function(data) {
                    $(`tr[data-row_id="${data['ID']}"]`).find('.exec-position').text(`${data['POSITION']}`);
                    $(`tr[data-row_id="${data['ID']}"]`).find('.exec-name').text(`${data['NAME']}`);
                    $('#task_body').find(`.task-executor[data-exec_id="${data['ID']}"]`).text(`${data['NAME']}`);
                    $.fancybox.close();
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        })
    });
</script>