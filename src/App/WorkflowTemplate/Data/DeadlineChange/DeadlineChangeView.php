<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\DeadlineChange;
use Nemundo\Model\View\ModelView;
class DeadlineChangeView extends ModelView {
/**
* @var DeadlineChangeModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new DeadlineChangeModel();
}
}