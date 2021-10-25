<?php

namespace Ekzam;

class Prepareform
{
    public function getForm($table,$type)          
    {
        if ($type == 'add') {
            $params['BUTTON_TYPE'] = 'add_button';
            $params['BUTTON_LABEL'] = 'Добавить';
           // $arState = $this->getStrState($value['state']);
           // $arExec = $this->getStrExec($value['exec']);
        } elseif($type == 'update') {
            $params['BUTTON_TYPE'] = 'update_button';
            $params['BUTTON_LABEL'] = 'Изменить';
           // $arState = $this->getStrState($value['state']);
           // $arExec = $this->getStrExec($value['exec']);
        } elseif($type == 'delete') {
            return '<div class="modal fade" id="delete_window" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><form><div>Вы уверены что хотите удалить элемент?</div><button type="submit" class="btn btn-secondary cancel" data-dismiss="modal">Отменить</button><button type="submit" class="btn btn-primary">Изменить</button></form></div></div></div></div>';
        }
        if ($table == 'exec') {
            $params['DATA_FIELD'] = 'div class="mb-3">
                                        <label for="exampleInputName" class="form-label">Имя</label>
                                        <input type="text" class="form-control" id="exampleInputName" value="'.($value && $type=='update') ? $value['name'] : ''.'">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPosition" class="form-label">Должность</label>
                                        <input type="text" class="form-control" id="exampleInputPosition" value="'.($value && $type=='update') ? $value['position'] : ''.'">
                                    </div>';
        } elseif ($table == 'task') {
            $params['DATA_FIELD'] = 'div class="mb-3">
                                        <label for="exampleInputName" class="form-label">Имя</label>
                                        <input type="text" class="form-control" id="exampleInputName" value="'.($value && $type=='update') ? $value['name'] : ''.'">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputState" class="form-label">Статус</label>
                                        <select class="form-select" aria-label="Статус" id="exampleInputState">
                                            <option value="1" selected>One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputExec" class="form-label">Исполнитель</label>
                                        <select class="form-select" aria-label="Исполнитель" id="exampleInputExec">
                                            <option value="1" selected>One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputDescr" class="form-label">Описание</label>
                                        <input type="text" class="form-control" id="exampleInputDescr" value="'.($value && $type=='update') ? $value['description'] : ''.'">
                                    </div>';
        }
    
        return '<div class="modal fade" id="form" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        '.$arParams['DATA_FIELD'].'
                        <button type="submit" class="btn btn-secondary cancel">Отменить</button>                                                                                    
                        <button type="submit" id="'.$arParams['BUTTON_TYPE'].'" class="btn btn-primary">'.$arParams['BUTTON_LABEL'].'</button>
                    </form>    
                </div>
            </div>
        </div>
    </div>';                                                                                                    //data-dismiss="modal"

    }

    public function getStrState($value)
    {
        if ($value) {

        }
    }

    public function getStrExec($value)
    {
        if ($value) {
            
        }
    }
}