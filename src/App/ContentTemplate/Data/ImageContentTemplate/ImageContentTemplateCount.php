<?php
namespace Nemundo\Workflow\App\ContentTemplate\Data\ImageContentTemplate;
class ImageContentTemplateCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ImageContentTemplateModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageContentTemplateModel();
}
}