<?php

namespace Nemundo\Workflow\App\PersonalTask\WorkflowStatus;


use Nemundo\Workflow\Action\NotificationWorkflowAction;
use Nemundo\Workflow\App\PersonalTask\Data\Comment\CommentModel;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataWorkflowStatus;


class PersonalTaskCommentWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->name = 'Kommentar';
        $this->statusText = 'Aufgabe wurde kommentiert';
        $this->id = '6ad1ddc1-04ff-47d6-bfaa-2677238c7de4';
        $this->modelClass = CommentModel::class;
        $this->changeWorkflowStatus = false;
        //$this->workflowItemClassName = WorkflowItem::class;

        //$this->addFollowingContentTypeClass(ProzesssteuerungTaskDoneWorkflowStatus::class);
        $this->addFollowingContentTypeClass(PersonalTaskCommentWorkflowStatus::class);


    }


    public function onChange(StatusChangeEvent $changeEvent)
    {

        //$dataId = (new WorkflowDataId())->getDataId($workflowId);
        /*$taskRow = (new TaskReader())->getRowById($changeEvent->getDataId());

        (new NotificationWorkflowAction($changeEvent))
            ->notificateUser($taskRow->workflow->userId);*/


        //$this->notificateUser($taskRow->workflow->userId);

    }

}