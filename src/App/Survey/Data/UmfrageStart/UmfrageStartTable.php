<?php
namespace Nemundo\Workflow\App\Survey\Data\UmfrageStart;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class UmfrageStartTable extends BootstrapModelTable {
/**
* @var UmfrageStartModel
*/
public $model;

protected function loadCom() {
$this->model = new UmfrageStartModel();
}
}