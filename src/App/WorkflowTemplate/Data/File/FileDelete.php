<?php
namespace Nemundo\Workflow\App\WorkflowTemplate\Data\File;
class FileDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var FileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
}
}