<?php
namespace Nemundo\Workflow\App\Workflow\Data\Process;
class Process extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ProcessModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $process;

/**
* @var string
*/
public $processClass;

public function __construct() {
parent::__construct();
$this->model = new ProcessModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->process, $this->process);
$this->typeValueList->setModelValue($this->model->processClass, $this->processClass);
$id = parent::save();
return $id;
}
}