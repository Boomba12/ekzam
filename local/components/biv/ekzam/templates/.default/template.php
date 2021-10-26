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
                <tbody id='task_body'>
                    <?foreach ($arResult['TASKS'] as $key => $task):?>
                        <tr class='table' data-row_id='<?=$key?>' data-type='task'>
                            <th scope="row" class='task-id'><?=$key?></th>
                            <td class='task-name'><?=$task['NAME']?></td>
                            <td class='task-state' data-exec_id='<?=$task['STATE']['ID']?>'><?=$task['STATE']['NAME']?></td>
                            <td class='task-executor' data-exec_id='<?=$task['EXECUTOR']['ID']?>'><?=$task['EXECUTOR']['NAME']?></td>
                            <td class='task-descr'><?=$task['DESCRIPTION']?></td>
                            <td class='task-buttons'>
                                <button type="button" class="btn btn-primary delete" data-id='<?=$key?>' data-type='task'>
                                    <?=GetMessage('BUTTON_DELETE')?>
                                </button>
                                <button type="button" class="btn btn-primary update" data-id='<?=$key?>' data-type='task'>
                                    <?=GetMessage('BUTTON_UPDATE')?>
                                </button>
                            </td>
                        </tr>
                    <?endforeach;?>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-primary add" data-type='task'>
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
                <tbody id='exec_body'>
                    <?foreach ($arResult['EXECUTORS'] as $key => $exec):?>
                        <tr class='table' data-row_id='<?=$key?>' data-type='exec'>
                            <th scope="row" class='exec-id'><?=$key?></th>
                            <td class='exec-name'><span><?=$exec['NAME']?></span></td>
                            <td class='exec-position'><?=$exec['POSITION']?></td>
                            <td class='exec-buttons'>
                                <button type="button" class="btn btn-primary delete" data-id='<?=$key?>' data-type='exec'>
                                    <?=GetMessage('BUTTON_DELETE');?>
                                </button>
                                <button type="button" class="btn btn-primary update" data-id='<?=$key?>' data-type='exec'>
                                    <?=GetMessage('BUTTON_UPDATE');?>
                                </button>
                            </td>
                        </tr>
                    <?endforeach;?>
                </tbody>
            </table>
            <div>
                <button type="button" class="btn btn-primary add" data-type='exec'>
                    <?=GetMessage('BUTTON_ADD')?>
                </button>
            </div>
        </div>
    </div>
</div>





