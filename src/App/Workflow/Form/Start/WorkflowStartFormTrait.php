<?php

namespace Nemundo\Workflow\App\Workflow\Form\Start;


use Nemundo\Workflow\App\Workflow\Builder\WorkflowBuilder;
use Nemundo\Workflow\App\Workflow\Process\AbstractProcess;

trait WorkflowStartFormTrait
{

    /**
     * @var AbstractProcess
     */
    public $process;

    /**
     * @var bool
     */
    public $appendWorkflowParameter = false;


    protected function saveWorkflow($workflowItemId)
    {

        $builder = new WorkflowBuilder();
        $builder->contentType = $this->process;
        //$builder->dataId = $dataId;
        $builder->dataId = $workflowItemId;
        //$builder->draft = $this->draft;
        $workflowId = $builder->createItem();

        return $workflowId;

    }


}