<?php

namespace Nemundo\Workflow\App\ToDo\Content;


use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Workflow\App\ToDo\Data\ToDo\ToDoModel;

class ToDoContentForm extends BootstrapModelForm
{

    public function getHtml()
    {

        $this->model = new ToDoModel();

        return parent::getHtml();
    }


    protected function onSubmit()
    {
        $id = parent::onSubmit();
        $this->runAfterSubmitEvent($id);
    }

}