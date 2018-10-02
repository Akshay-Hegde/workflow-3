<?php

namespace Nemundo\Workflow\App\Workflow\Process;

use Nemundo\App\Content\Collection\AbstractContentTypeCollection;
use Nemundo\App\Content\Collection\ContentTypeCollection;
use Nemundo\User\Access\UserAccessTrait;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Event\WorkflowStartEvent;
use Nemundo\Workflow\App\Workflow\Process\Item\ProcessContentView;
use Nemundo\App\Content\Type\AbstractModelDataContentType;
use Nemundo\Workflow\App\Workflow\Site\WorkflowItemSite;
use Nemundo\Workflow\App\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;


abstract class AbstractModelProcess extends AbstractModelDataContentType
{

    use UserAccessTrait;

    /**
     * @var string
     */
    public $contentName;

    /**
     * @var string
     */
    public $contentId;

    /**
     * @var string
     */
    public $description;

    /**
     * @var AbstractSite
     */
    public $itemSite;

    /**
     * @var string
     */
    public $processItemClassName;

    /**
     * @var string
     */
    public $prefix = '';

    /**
     * @var int
     */
    public $startNumber = 1000;

    /**
     * @var string
     */
    public $startWorkflowStatusClass;

    /**
     * @var bool
     */
    public $createWorkflowNumber = true;

    /**
     * @var string
     */
    public $workflowId;


    /**
     * @var AbstractContentTypeCollection
     */
    public $processMenu;


    public function __construct()
    {

        $this->itemSite = WorkflowItemSite::$site;
        $this->viewClass = ProcessContentView::class;
        $this->parameterClass = WorkflowParameter::class;

        $this->processMenu = new ContentTypeCollection();

        $this->loadData();

        //parent::__construct();

    }


    public function getForm($parentItem = null)
    {

        $workflowStatus = $this->getStartWorkflowStatus();
        $form = $workflowStatus->getForm($parentItem);

        return $form;

    }


    public function getStartWorkflowStatus()
    {


        $workflowStatus = (new WorkflowStatusFactory())->getWorkflowStatus($this->startWorkflowStatusClass);
        return $workflowStatus;

    }


    public function getSubject($dataId)
    {

        $row = (new WorkflowReader())->getRowById($dataId);
        $subject = $row->workflowNumber . ' ' . $row->subject;
        return $subject;

    }


    public function getSource($dataId)
    {

        $source = $this->contentName;
        return $source;


    }


}