<?php

namespace Nemundo\Workflow\App\PersonalTask\WorkflowStatus;


use Nemundo\Workflow\App\Inbox\Builder\InboxBuilder;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskModel;
use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskReader;
use Nemundo\Workflow\App\PersonalTask\Process\PersonalTaskProcess;
use Nemundo\Workflow\App\SearchEngine\Builder\SearchIndexBuilder;
use Nemundo\Workflow\App\Task\Builder\TaskBuilder;
use Nemundo\Workflow\App\Workflow\Builder\StatusChangeEvent;
use Nemundo\Workflow\WorkflowStatus\AbstractDataWorkflowStatus;


class PersonalTaskErfassungWorkflowStatus extends AbstractDataWorkflowStatus
{

    protected function loadData()
    {

        $this->name = 'Aufgabe Erfassung';
        $this->workflowStatusText = 'Aufgabe wurde erfasst';
        $this->id = 'f2736f64-d659-4d2f-b73c-7a16b77c28ee';
        //$this->formClassName = TaskWorkflowForm::class;
        $this->modelClass = PersonalTaskModel::class;



        $this->addFollowingStatusClassName(CommentTaskWorkflowStatus::class);
        $this->addFollowingStatusClassName(PersonalTaskDoneWorkflowStatus::class);


        //$this->addFollowingStatusClassName(ClosingWorkflowStatus::class);
        //$this->addFollowingStatusClassName(DeadlineChangeWorkflowStatus::class);
        //$this->addFollowingStatusClassName(UserAssignmentChangeWorkflowStatus::class);

    }


    public function onChange(StatusChangeEvent $changeEvent)
    {

        $personalTaskRow = (new PersonalTaskReader())->getRowById($changeEvent->workflowItemId);


        $subject = $personalTaskRow->workflow->workflowNumber . ' ' . $personalTaskRow->task;


        /*
        $builder = new InboxBuilder();
        $builder->contentType = new PersonalTaskProcess();
        $builder->dataId = $changeEvent->workflowItemId;
        $builder->subject = $subject;
        $builder->createUserInbox($personalTaskRow->responsibleUserId);*/

        $builder = new TaskBuilder();
        $builder->contentType = new PersonalTaskProcess();
        $builder->task = $personalTaskRow->task;
        $builder->dataId = $changeEvent->getDataId();  //workflowId;
        $builder->deadline = $personalTaskRow->deadline;
        $builder->timeEffort = $personalTaskRow->timeEffort;
        $builder->createUserTask($personalTaskRow->responsibleUserId);

        $builder = new SearchIndexBuilder();
        $builder->contentType = new PersonalTaskProcess();
        $builder->dataId = $changeEvent->getDataId();
        $builder->addText($personalTaskRow->task);



        /*
        (new SubjectWorkflowAction($changeEvent))
            ->changeSubject($taskRow->task);

        (new AssignmentWorkflowAction($changeEvent))
            ->assignUser($taskRow->verantwortlicherId);

        (new DeadlineWorkflowAction($changeEvent))
            ->changeDeadline($taskRow->erledigenBis);

        (new NotificationWorkflowAction($changeEvent))
            ->notificateUser($taskRow->verantwortlicherId);*/

    }

}