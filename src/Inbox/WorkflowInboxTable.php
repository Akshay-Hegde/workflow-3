<?php

namespace Nemundo\Workflow\Inbox;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\Com\TrafficLight\DateTrafficLight;
use Nemundo\Workflow\Data\Workflow\WorkflowModel;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Design\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\Data\UserAssignment\UserAssignmentReader;
use Nemundo\Workflow\Data\UsergroupAssignment\UsergroupAssignmentReader;
use Nemundo\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;


class WorkflowInboxTable extends AbstractHtmlContainerList
{

    use WorkflowInboxTrait;

    public function getHtml()
    {

        $workflowReader = new WorkflowPaginationReader();
        $this->loadReader($workflowReader);

        $workflowReader->model->loadUser();

        $workflowReader->paginationLimit = 30;

        $workflowCount = $this->getWorkflowCount();
        $workflowReader->count = $workflowCount;

        $p = new Paragraph($this);
        $p->content = 'Total Workflow: ' . $workflowCount;

        $table = new BootstrapClickableTable($this);
        $table->smallTable = true;
        $table->hover = true;


        $model = new WorkflowModel();

        $header = new TableHeader($table);
        $header->addEmpty();
        //$header->addText($model->processId->label);
        //$header->addText($model->workflowNumber->label);
        //$header->addText($model->subject->label);

        $header->addText('Prozess');
        $header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addText('Abgeschlossen');
        $header->addText('Erledigen bis');
        $header->addText('Zugewiesen an Benutzer');
        $header->addText('Zugewiesen an Benutzergruppe');
        $header->addText('Ersteller');


        //$header->addText($model->workflowStatusId->label);
        //$header->addText($model->closed->label);
        //$header->addText($model->deadline->label);
        /*$header->addText('Assign to (User)');
        $header->addText('Assign to (Usergroup)');
        $header->addText('Creator');*/

        $header->addEmpty();


        foreach ($workflowReader->getData() as $workflowRow) {

            $row = new BootstrapClickableTableRow($table);

            $trafficLight = new DateTrafficLight($row);
            $trafficLight->date = $workflowRow->deadline;

            $row->addText($workflowRow->process->process);
            $row->addText($workflowRow->workflowNumber);
            $row->addText($workflowRow->subject);
            $row->addText($workflowRow->workflowStatus->workflowStatus);
            $row->addYesNo($workflowRow->closed);

            if ($workflowRow->deadline !== null) {
                $row->addText($workflowRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            // User
            $reader = new UserAssignmentReader();
            $reader->model->loadUser();
            $reader->filter->andEqual($reader->model->workflowId, $workflowRow->id);

            $user = new TextDirectory();
            foreach ($reader->getData() as $assignmentRow) {
                $user->addValue($assignmentRow->user->displayName);
            }
            $row->addText($user->getTextWithSeperator());

            // Usergroup
            $reader = new UsergroupAssignmentReader();
            $reader->model->loadUsergroup();
            $reader->filter->andEqual($reader->model->workflowId, $workflowRow->id);

            $usergroup = new TextDirectory();
            foreach ($reader->getData() as $assignmentRow) {
                $usergroup->addValue($assignmentRow->usergroup->usergroup);
            }
            $row->addText($usergroup->getTextWithSeperator());

            $row->addText($workflowRow->user->displayName . ' ' . $workflowRow->dateTime->getShortDateTimeLeadingZeroFormat());

            $site = $workflowRow->process->getProcessClassObject()->getApplicationSite();
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapModelPagination($this);
        $pagination->paginationReader = $workflowReader;

        return parent::getHtml();

    }

}