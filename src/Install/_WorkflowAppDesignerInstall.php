<?php

namespace Nemundo\Workflow\Install;


use Nemundo\Admin\AppDesigner\Setup\TemplateModelSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Workflow\Model\WorkflowBaseOrmModel;

class WorkflowAppDesignerInstall extends AbstractScript
{

    public function run()
    {

        $setup = new TemplateModelSetup();
        $setup->addTemplateModel(new WorkflowBaseOrmModel());

    }

}