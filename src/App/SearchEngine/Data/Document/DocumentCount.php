<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Document;
class DocumentCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var DocumentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DocumentModel();
}
}