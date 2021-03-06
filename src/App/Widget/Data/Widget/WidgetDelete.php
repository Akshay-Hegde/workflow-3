<?php

namespace Nemundo\Workflow\App\Widget\Data\Widget;
class WidgetDelete extends \Nemundo\Model\Delete\AbstractModelDelete
{
    /**
     * @var WidgetModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new WidgetModel();
    }
}