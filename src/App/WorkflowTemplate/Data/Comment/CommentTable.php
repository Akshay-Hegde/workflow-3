<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\Comment;
use Nemundo\Package\Bootstrap\Table\BootstrapModelTable;
class CommentTable extends BootstrapModelTable {
/**
* @var CommentModel
*/
public $model;

protected function loadCom() {
$this->model = new CommentModel();
}
}