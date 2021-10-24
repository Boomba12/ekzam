<?php
    $this->addExternalCss('styles.css');
?>

<div class="tabs">
    <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
    <label for="tab-btn-1">Задачи</label>
    <input type="radio" name="tab-btn" id="tab-btn-2" value="">
    <label for="tab-btn-2">Исполнители</label>
aaaaa
    <div id="content-1">
        <?foreach ($arResult['TASKS'] as $key => $task):?>
            <div class='row'>
                <span class='task-id'><?=$key?></span>
                <span class='task-name'><?=$task['NAME']?></span>
                <span class='task-state'><?=$task['STATE']?></span>
                <span class='task-executor'><?=$task['EXECUTOR']?></span>
                <span class='task-descr'><?=$task['DESCRIPTION']?></span>
                <span class='task-buttons'>
                    <span>Удалить</span>
                    <span>Редактировать</span>
                </span>
            </div>
        <?endforeach;?>
    </div>
    <div id="content-2">
        <?foreach ($arResult['EXECUTOR'] as $key => $exec):?>
            <div class='row'>
                <span class='exec-id'><?=$key?></span>
                <span class='exec-name'><?=$exec['NAME']?></span>
                <span class='exec-position'><?=$exec['POSITION']?></span>
                <span class='exec-buttons'>
                    <span>Удалить</span>
                    <span>Редактировать</span>
                </span>
            </div>
        <?endforeach;?>
    </div>
</div>