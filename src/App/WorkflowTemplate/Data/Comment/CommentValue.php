<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\Comment;
class CommentValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var CommentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CommentModel();
}
}