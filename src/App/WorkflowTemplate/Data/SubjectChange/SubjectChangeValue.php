<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\SubjectChange;
class SubjectChangeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SubjectChangeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SubjectChangeModel();
}
}