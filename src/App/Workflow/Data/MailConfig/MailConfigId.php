<?php

namespace Nemundo\Workflow\App\Workflow\Data\MailConfig;

use Nemundo\Model\Id\AbstractModelIdValue;

class MailConfigId extends AbstractModelIdValue
{
    /**
     * @var MailConfigModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MailConfigModel();
    }
}