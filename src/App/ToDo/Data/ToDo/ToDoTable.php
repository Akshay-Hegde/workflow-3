<?php
namespace Nemundo\Workflow\App\ToDo\Data\ToDo;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class ToDoTable extends BootstrapModelTable {
/**
* @var ToDoModel
*/
public $model;

protected function loadCom() {
$this->model = new ToDoModel();
}
}