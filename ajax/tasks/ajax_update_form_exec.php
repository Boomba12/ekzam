<?php
use Bitrix\Main\Context, 
    Ekzam\Tableoperation;

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$request = Context::getCurrent()->getRequest();
$id = $request->get('id');
$type = $request->get('type');
$arResult = Tableoperation::getFields($id,$type);
?>
<div class="wind" id="form">
    <form>
        <div class="mb-3">
            <label class="form-label">Имя</label>
            <input type="text" class="form-control" name='NAME' value='<?=$arResult['UF_NAME_EXECUTOR']?>'>
        </div>
        <div class="mb-3">
            <label class="form-label">Должность</label>
            <input type="text" class="form-control" name='POSITION' value='<?=$arResult['UF_POSITION_EXECUTOR']?>'>
        </div>
        <button id="exec_update_button" class="btn btn-primary">Обновить</button>
    </form>
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
                    alert('Успешно обновлено');
                    $.fancybox.close();
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        })
    });
</script>