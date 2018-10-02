<?php

namespace Nemundo\Workflow\App\PersonalTask\WorkflowStatus;


use Nemundo\Workflow\App\PersonalTask\Data\Comment\CommentModel;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskUpdate;
use Nemundo\Workflow\App\Task\Item\TaskItem;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;


class PersonalTaskDoneWorkflowStatus extends AbstractModelDataWorkflowStatus
{

    protected function loadData()
    {

        $this->contentName = 'Erledigt';
        $this->statusText = 'Aufgabe wurde erledigt';
        $this->contentId = '4eb59f4f-0a08-42e4-98a3-c8b9922552b7';
        $this->closingWorkflow = true;
        $this->modelClass = CommentModel::class;

    }


    public function onCreate($dataId)
    {

        $update = new PersonalTaskUpdate();
        $update->done = true;
        $update->updateById($this->workflowId);


        (new TaskItem($this->workflowId))
            ->archiveTask();

    }


}