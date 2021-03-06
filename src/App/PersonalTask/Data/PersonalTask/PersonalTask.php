<?php
namespace Nemundo\Workflow\App\PersonalTask\Data\PersonalTask;
class PersonalTask extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PersonalTaskModel
*/
protected $model;

/**
* @var string
*/
public $workflowId;

/**
* @var string
*/
public $task;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var string
*/
public $responsibleUserId;

/**
* @var float
*/
public $timeEffort;

/**
* @var bool
*/
public $done;

/**
* @var string
*/
public $description;

/**
* @var \Nemundo\Model\Data\Property\File\MultiRedirectFilenameDataProperty
*/
public $file;

public function __construct() {
parent::__construct();
$this->model = new PersonalTaskModel();
$this->deadline = new \Nemundo\Core\Type\DateTime\Date();
$this->file = new \Nemundo\Model\Data\Property\File\MultiRedirectFilenameDataProperty($this->model->file, $this->typeValueList);
}
public function save() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->task, $this->task);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->deadline, $this->typeValueList);
$property->setValue($this->deadline);
$this->typeValueList->setModelValue($this->model->responsibleUserId, $this->responsibleUserId);
$value = (new \Nemundo\Core\Type\Text\Text($this->timeEffort))->replace(",", ".")->getValue();
$this->typeValueList->setModelValue($this->model->timeEffort, $value);
$this->typeValueList->setModelValue($this->model->done, $this->done);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$id = parent::save();
$this->file->saveData($id);
return $id;
}
}