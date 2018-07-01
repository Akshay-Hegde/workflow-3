<?php

namespace Nemundo\Workflow\App\PersonalTask\Process;


use Nemundo\Workflow\App\PersonalTask\Data\PersonalTask\PersonalTaskModel;
use Nemundo\Workflow\App\PersonalTask\Site\PersonalTaskItemSite;
use Nemundo\Workflow\App\PersonalTask\WorkflowStatus\PersonalTaskErfassungWorkflowStatus;
use Nemundo\Workflow\Process\AbstractProcess;


class PersonalTaskProcess extends AbstractProcess
{

    protected function loadType()
    {

        $this->name = 'Aufgaben';
        $this->description = 'Aufgabenvewaltung';
        $this->id = 'f340fd8d-3bb4-455e-ae1d-118e6ec7c654';

        $this->itemSite = PersonalTaskItemSite::$site;
        $this->prefix = 'T-';
        $this->modelClass = PersonalTaskModel::class;
        $this->startWorkflowStatusClassName = PersonalTaskErfassungWorkflowStatus::class;

    }

}