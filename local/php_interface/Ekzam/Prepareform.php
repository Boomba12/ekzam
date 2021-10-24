<?php

namespace Ekzam;

class Prepareform
{
    public function getDeleteForm()
    {
        return '<div class=\'modal fade\' id=\'deleteElement\'>
        <div class=\'modal-dialog\'>
            <div class=\'modal-content\'>
                <div class=\'modal-header\'>
                    <h5 class=\'modal-title\' id=\'staticBackdropLabel\'>Удалить элемент?</h5>
                <button type=\'button\' class=\'close\' data-dismiss=\'modal\' aria-label=\'Close\'>
                    <span aria-hidden=\'true\'>&times;</span>
                </button>
                </div>
                <div class=\'modal-footer\'>
                    <button type=\'button\' class=\'btn btn-secondary cancel\' data-dismiss=\'modal\'>Нет</button>
                    <button type=\'button\' class=\'btn btn-primary ready\'>Да</button>
                </div>
            </div>
        </div>
    </div>';
    
    }
    public function getUpdateForm($table)
    {
        if ($table == 'exec') {
            $params['ID_FORM'] = 'changeElementExec';
            $params['DATA_FIELD'] = 'div class="mb-3">
                                        <label for="exampleInputName" class="form-label">Имя</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPosition" class="form-label">Должность</label>
                                        <input type="text" class="form-control">
                                    </div>';
        } elseif ($table == 'task') {
            $params['ID_FORM'] = 'changeElementTask';
            $params['DATA_FIELD'] = 'div class="mb-3">
                                        <label for="exampleInputName" class="form-label">Имя</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputState" class="form-label">Статус</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputExec" class="form-label">Исполнитель</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputDescr" class="form-label">Описание</label>
                                        <input type="text" class="form-control">
                                    </div>';
        }
    
        return '<div class="modal fade" id="'.$arParams['ID_FORM'].'" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        '.$arParams['DATA_FIELD'].'
                        <button type="submit" class="btn btn-secondary cancel" data-dismiss="modal">Отменить</button>
                        <button type="submit" class="btn btn-primary">Изменить</button>
                    </form>    
                </div>
            </div>
        </div>
    </div>';

    }
    public function getAddForm($table)
    {
        if ($table == 'exec') {
            $params['ID_FORM'] = 'changeElementExec';
            $params['DATA_FIELD'] = 'div class="mb-3">
                                        <label for="exampleInputName" class="form-label">Имя</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPosition" class="form-label">Должность</label>
                                        <input type="text" class="form-control">
                                    </div>';
        } elseif ($table == 'task') {
            $params['ID_FORM'] = 'changeElementTask';
            $params['DATA_FIELD'] = 'div class="mb-3">
                                        <label for="exampleInputName" class="form-label">Имя</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputState" class="form-label">Статус</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputExec" class="form-label">Исполнитель</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputDescr" class="form-label">Описание</label>
                                        <input type="text" class="form-control">
                                    </div>';
        }
    
        return '<div class="modal fade" id="'.$arParams['ID_FORM'].'" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        '.$arParams['DATA_FIELD'].'
                        <button type="submit" class="btn btn-secondary cancel" data-dismiss="modal">Отменить</button>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>    
                </div>
            </div>
        </div>
    </div>';
    
    }
}