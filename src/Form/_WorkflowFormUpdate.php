<?php

namespace Nemundo\Workflow\Form;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Design\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Model\Data\ModelData;
use Nemundo\Model\Data\ModelUpdate;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Model\Form\AbstractModelForm;
use Nemundo\Model\Form\ModelFormUpdate;
use Nemundo\App\Application\Type\AbstractWorkflowApplication;
use Nemundo\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\Data\WorkflowStatusChange\WorkflowStatusChangeReader;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;

class WorkflowFormUpdate extends ModelFormUpdate
{

    /**
     * @var AbstractWorkflowApplication
     */
    //public $application;

    /**
     * @var AbstractWorkflowStatus
     */
    //public $workflowStatus;

    /**
     * @var string
     */
    //public $workflowId;


    /*

    public function getHtml()
    {

        if (is_null($this->workflowStatus->modelClassName)) {
            LogMessage::writeError('Workflow Form: No Model Class Name');
            return;
        }


        //$workflowReader = new WorkflowReader();
        //$workflowReader->model->loadWorkflowStatus();

        $this->model = (new ModelFactory())->getModelByClassName($this->workflowStatus->modelClassName);

        //$reader = new WorkflowStatusChangeReader();
        //$reader->


        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $workflowItemId = parent::onSubmit();

        if ($this->workflowId !== null) {
            $this->workflowStatus->runWorkflow($this->workflowId, $workflowItemId);

        } else {

            $model = (new ModelFactory())->getModelByClassName($this->application->baseModelClassName);

            $data = new ModelData();
            $data->model = $model;
            $dataId = $data->save();


            $builder = new WorkflowBuilder();
            $builder->application = $this->application;
            $builder->workflowStatus = $this->workflowStatus;
            $builder->dataId = $dataId;
            $workflowId = $builder->createItem();

            /*
            $data = new ModelUpdate();
            $data->model = $model;
            $data->typeValueList->setModelValue($model->wor)
            $dataId = $data->save();
            */

   /*        $this->workflowStatus->runWorkflow($workflowId, $workflowItemId);

        }


        return $workflowItemId;

    }*/


}