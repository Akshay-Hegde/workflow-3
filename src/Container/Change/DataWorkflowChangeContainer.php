<?php

namespace Nemundo\Workflow\Container\Change;


use Nemundo\Core\Debug\Debug;
use Nemundo\Workflow\Form\WorkflowForm;

class DataWorkflowChangeContainer extends AbstractWorkflowChangeContainer
{

    public function getHtml()
    {
        /*(new Debug())->write('was');
        (new Debug())->write($this->redirectSite);
        exit;*/

        $form = new WorkflowForm($this);
        $form->workflowStatus = $this->workflowStatus;
        $form->workflowId = $this->workflowId;
        $form->redirectSite = $this->redirectSite;
        //$form->appendWorkflowParameter = $this->appendWorkflowParameter;
        //$form->redirectSite->addParameter($workflowParameter);





        return parent::getHtml();

    }


}