<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange;
class DeadlineChangeListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var DeadlineChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new DeadlineChangeModel();
$this->label = $this->model->label;
}
}