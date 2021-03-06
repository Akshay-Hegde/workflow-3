<?php

namespace Nemundo\Workflow;

use Nemundo\Core\File\Path;
use Nemundo\Project\AbstractProject;

class WorkflowProject extends AbstractProject
{

    public function loadProject()
    {

        $this->project = 'Workflow';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;

        $this->dbFilename = (new Path())
            ->addPath(__DIR__)
            ->addPath('..')
            ->addPath('db')
            ->addPath('workflow.db')
            ->getFilename();

    }

}