<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
?>
<div class="wind" id="form">
    <form>
        <div class="mb-3">
            <label class="form-label">Имя</label>
            <input type="text" class="form-control" name='NAME'>
        </div>
        <div class="mb-3">
            <label class="form-label">Должность</label>
            <input type="text" class="form-control" name='POSITION'>
        </div>
        <button id="exec_add_button" class="btn btn-primary">Добавить</button>
    </form>
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