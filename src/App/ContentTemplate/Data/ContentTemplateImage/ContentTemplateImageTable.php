<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage;
use Nemundo\Design\Bootstrap\Table\BootstrapModelTable;
class ContentTemplateImageTable extends BootstrapModelTable {
/**
* @var ContentTemplateImageModel
*/
public $model;

protected function loadCom() {
$this->model = new ContentTemplateImageModel();
}
}