<?php
namespace Nemundo\Workflow\Data\Workflow;
class WorkflowRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $number;

/**
* @var string
*/
public $workflowNumber;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $processId;

/**
* @var \Nemundo\Workflow\Data\Process\ProcessRow
*/
public $process;

/**
* @var string
*/
public $dataId;

/**
* @var bool
*/
public $draft;

/**
* @var bool
*/
public $closed;

/**
* @var int
*/
public $itemOrder;

/**
* @var string
*/
public $workflowStatusId;

/**
* @var \Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatusRow
*/
public $workflowStatus;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var string
*/
public $userModifiedId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $userModified;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeModified;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->number = $this->getModelValue($model->number);
$this->workflowNumber = $this->getModelValue($model->workflowNumber);
$this->subject = $this->getModelValue($model->subject);
$this->processId = $this->getModelValue($model->processId);
if ($model->process !== null) {
$this->loadNemundoWorkflowDataProcessProcessprocessRow($model->process);
}
$this->dataId = $this->getModelValue($model->dataId);
$this->draft = $this->getModelValue($model->draft);
$this->closed = $this->getModelValue($model->closed);
$this->itemOrder = $this->getModelValue($model->itemOrder);
$this->workflowStatusId = $this->getModelValue($model->workflowStatusId);
if ($model->workflowStatus !== null) {
$this->loadNemundoWorkflowDataWorkflowStatusWorkflowStatusworkflowStatusRow($model->workflowStatus);
}
$value = $this->getModelValue($model->deadline);
if ($value !== "0000-00-00") {
$this->deadline = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->deadline));
}
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->userModifiedId = $this->getModelValue($model->userModifiedId);
if ($model->userModified !== null) {
$this->loadNemundoUserDataUserUseruserModifiedRow($model->userModified);
}
$this->dateTimeModified = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeModified));
}
private function loadNemundoWorkflowDataProcessProcessprocessRow($model) {
$this->process = new \Nemundo\Workflow\Data\Process\ProcessRow($this->row, $model);
}
private function loadNemundoWorkflowDataWorkflowStatusWorkflowStatusworkflowStatusRow($model) {
$this->workflowStatus = new \Nemundo\Workflow\Data\WorkflowStatus\WorkflowStatusRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserModifiedRow($model) {
$this->userModified = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}