<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate;
class TextContentTemplateListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var TextContentTemplateModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new TextContentTemplateModel();
$this->label = $this->model->label;
}
}