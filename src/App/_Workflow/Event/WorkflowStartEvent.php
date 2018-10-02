<?php

namespace Nemundo\Workflow\App\Workflow\Event;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Event\AbstractEvent;
use Nemundo\Workflow\App\Workflow\Data\Workflow\Workflow;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowValue;
use Nemundo\Workflow\App\Workflow\Process\AbstractModelProcess;
use Nemundo\Workflow\App\Workflow\Factory\WorkflowStatusFactory;

class WorkflowStartEvent extends AbstractEvent
{

    /**
     * @var AbstractModelProcess
     */
    public $process;


    public function run($id)
    {

        //(new Debug())->write('start event');
        //exit;


        $startWorkflowStatus = (new WorkflowStatusFactory())->getWorkflowStatus($this->process->startWorkflowStatusClass);

        $data = new Workflow();
        $data->id = $id;
        $data->processId = $this->process->contentId;

        $workflowNumber = null;
        if ($this->process->createWorkflowNumber) {

            $number = 0;

            if ($workflowNumber == null) {

                $value = new WorkflowValue();
                $value->field = $value->model->number;
                $value->filter->andEqual($value->model->processId, $this->process->contentId);
                $number = $value->getMaxValue();

                if ($number == 0) {
                    $number = $this->process->startNumber - 1;
                }

                $number++;

                $workflowNumber = $this->process->prefix . $number;

            }

            $data->number = $number;
            $data->workflowNumber = $workflowNumber;

        }

        $data->dataId = $id;
        $data->save();

        $event = new WorkflowEvent();
        $event->workflowStatus = $startWorkflowStatus;
        $event->workflowId = $id;
        $event->run($id);

    }

}