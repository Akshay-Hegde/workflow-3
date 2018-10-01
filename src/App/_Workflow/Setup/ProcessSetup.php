<?php

namespace Nemundo\Workflow\App\Workflow\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\Workflow\App\Workflow\Data\Process\Process;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessDelete;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessUpdate;
use Nemundo\Workflow\App\Workflow\Process\AbstractModelProcess;

class ProcessSetup extends AbstractBase
{

    public function addProcess(AbstractModelProcess $process)
    {

        $data = new Process();
        $data->updateOnDuplicate = true;
        $data->id = $process->contentId;
        $data->process = $process->contentName;
        $data->processClass = $process->getClassName();
        $data->setupStatus = true;
        $data->save();

        $setup = new ContentTypeSetup();
        $setup->addContentType($process);


    }


    public function removeUnusedProcess()
    {

        $delete = new ProcessDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

        $update = new ProcessUpdate();
        $update->setupStatus = false;
        $update->update();

    }


    /*
    public function removeProcess(AbstractProcess $process)
    {

        $reader = new WorkflowInboxReader();
        $reader->addProcessFilter($process);

        foreach ($reader->getData() as $workflowRow) {
            (new WorkflowDelete())->deleteWorkflow($workflowRow->id);
        }

        $delete = new ProcessDelete();
        $delete->deleteById($process->id);

    }*/
}