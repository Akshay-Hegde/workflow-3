<?php
namespace Nemundo\Workflow\App\Store\Data\NumberStore;
class NumberStorePaginationReader extends \Nemundo\Model\Reader\AbstractModelPaginationDataReader {
/**
* @var NumberStoreModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NumberStoreModel();
}
/**
* @return NumberStoreRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new NumberStoreRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}