<?php
namespace Nemundo\Workflow\App\Workflow\Data\Workflow;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class WorkflowTable extends BootstrapModelTable {
/**
* @var WorkflowModel
*/
public $model;

protected function loadCom() {
$this->model = new WorkflowModel();
}
}