<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
class SubjectChangeForm extends \Nemundo\Package\Bootstrap\Form\BootstrapModelForm {
/**
* @var SubjectChangeModel
*/
public $model;

protected function loadCom() {
$this->model = new SubjectChangeModel();
}
protected function onSubmit() {
return parent::onSubmit();
}
}