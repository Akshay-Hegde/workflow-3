<?php

namespace Nemundo\Workflow\WorkflowStatus;


use Nemundo\Workflow\Com\Item\ChangeWorkflowItemView;
use Nemundo\Workflow\Container\Change\ChangeWorkflowChangeContainer;
use Nemundo\Workflow\Container\Start\ChangeWorkflowStartContainer;

abstract class AbstractChangeWorkflowStatus extends AbstractWorkflowStatus
{

    public function __construct()
    {

        $this->workflowItemViewClassName = ChangeWorkflowItemView::class;
        $this->startContainerClass = ChangeWorkflowStartContainer::class;
        $this->changeContainerClass = ChangeWorkflowChangeContainer::class;
        parent::__construct();

    }

}