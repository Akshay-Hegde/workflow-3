<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\Comment;
class CommentPaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var CommentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CommentModel();
}
/**
* @return CommentRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new CommentRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}