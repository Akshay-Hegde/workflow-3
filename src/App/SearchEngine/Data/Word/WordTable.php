<?php
namespace Nemundo\Workflow\App\SearchEngine\Data\Word;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class WordTable extends BootstrapModelTable {
/**
* @var WordModel
*/
public $model;

protected function loadCom() {
$this->model = new WordModel();
}
}