<?php
?>
<div class="tab-container">
    <div class="tab-wrapper">
        <input type="radio" name="tab" id="tab1" checked />
        <label class="tab-label" for="tab1" nth="1"><?=GetMessage('TASK_LABEL')?></label>
        <div class='tab-item' id="tab-content1">
            <table class="table tasks">
                <thead>
                    <tr>
                    <th scope="col"><?=GetMessage('TASK_ID_COLUMN')?></th>
                    <th scope="col"><?=GetMessage('TASK_NAME_COLUMN')?></th>
                    <th scope="col"><?=GetMessage('TASK_STATE_COLUMN')?></th>
                    <th scope="col"><?=GetMessage('TASK_EXECUTOR_COLUMN')?></th>
                    <th scope="col"><?=GetMessage('TASK_DESCRIPTION_COLUMN')?></th>
                    <th scope="col"><?=GetMessage('TASK_ADMIN_COLUMN')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach ($arResult['TASKS'] as $key => $task):?>
                        <tr class='table'>
                            <th scope="row" class='task-id'><?=$key?></th>
                            <td class='task-name'><?=$task['NAME']?></td>
                            <td class='task-state'><?=$task['STATE']?></td>
                            <td class='task-executor'><?=$task['EXECUTOR']?></td>
                            <td class='task-descr'><?=$task['DESCRIPTION']?></td>
                            <td class='task-buttons'>
                                <button type="button" class="btn btn-primary delete" data-id='<?=$key?>' data-type='task'>
                                    <?=GetMessage('BUTTON_DELETE')?>
                                </button>
                                <button type="button" class="btn btn-primary update" data-toggle="modal" data-target="#changeElementTask" data-id='<?=$key?>'>
                                    <?=GetMessage('BUTTON_UPDATE')?>
                                </button>
                            </td>
                        </tr>
                    <?endforeach;?>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#addElementTask">
                    <?=GetMessage('BUTTON_ADD')?>
                </button>
            </div>
        </div>
        <input type="radio" name="tab" id="tab2" />
        <label class="tab-label" for="tab2" nth="2"><?=GetMessage('EXEC_LABEL')?></label>
        <div class='tab-item' id="tab-content2">
            <table class="table exec">
                <thead>
                    <tr>
                    <th scope="col"><?=GetMessage('EXEC_ID_COLUMN')?></th>
                    <th scope="col"><?=GetMessage('EXEC_NAME_COLUMN')?></th>
                    <th scope="col"><?=GetMessage('EXEC_POSITION_COLUMN')?></th>
                    <th scope="col"><?=GetMessage('EXEC_ADMIN_COLUMN')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach ($arResult['EXECUTORS'] as $key => $exec):?>
                        <tr class='table'>
                            <th scope="row" class='exec-id'><?=$key?></th>
                            <td class='exec-name'><?=$exec['NAME']?></td>
                            <td class='exec-poasition'><?=$exec['POSITION']?></td>
                            <td class='task-buttons'>
                                <button type="button" class="btn btn-primary delete" data-toggle="modal" data-target="#deleteElement" data-id='<?=$key?>' data-type='exec'>
                                    <?=GetMessage('BUTTON_DELETE');?>
                                </button>
                                <button type="button" class="btn btn-primary update" data-toggle="modal" data-target="#changeElementExec" data-id='<?=$key?>'>
                                    <?=GetMessage('BUTTON_UPDATE');?>
                                </button>
                            </td>
                        </tr>
                    <?endforeach;?>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#addElementExec">
                    <?=GetMessage('BUTTON_ADD')?>
                </button>
            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary test" data-id='1' data-type='task'>Test</button>





