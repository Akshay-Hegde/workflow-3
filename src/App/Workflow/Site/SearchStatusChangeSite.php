<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\Core\Debug\Debug;
use Nemundo\Design\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Container\Change\WorkflowStatusChangeContainer;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatusReader;
use Nemundo\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Workflow\WorkflowStatus\AbstractDataListWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractFormWorkflowStatus;
use Nemundo\Workflow\WorkflowStatus\AbstractWorkflowStatus;


class SearchStatusChangeSite extends AbstractSite
{

    /**
     * @var SearchStatusChangeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'status-change';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        SearchStatusChangeSite::$site = $this;
    }


    public function loadContent()
    {


        $workflowStatusId = (new WorkflowStatusParameter())->getValue();

        $workflowStatusRow = (new WorkflowStatusReader())->getRowById($workflowStatusId);

        /** @var AbstractWorkflowStatus|AbstractDataListWorkflowStatus|AbstractFormWorkflowStatus $workflowStatus */
        $workflowStatus = $workflowStatusRow->getWorkflowStatusClassObject();

        $workflowParameter = new WorkflowParameter();
        $workflowId = $workflowParameter->getValue();

        $workflowItem = new WorkflowItem($workflowId);

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        /*$link = new Hyperlink($page);
        $link->content = 'Back (Search Engine)';
        $link->site = clone(WorkflowSearchEngineSite::$site);

        $link = new Hyperlink($page);
        $link->content = 'Back';
        $link->site = clone(SearchItemSite::$site);
        $link->site->addParameter($workflowParameter);*/

        $breadcrumb = new BootstrapBreadcrumb($page);
        $breadcrumb->addItem(WorkflowSearchSite::$site);

        $site = clone(WorkflowItemSite::$site);
        $site->title = $workflowItem->getTitle();
        $site->addParameter($workflowParameter);
        $breadcrumb->addItem($site);

        $breadcrumb->addActiveItem($workflowStatus->name);


        $title = new WorkflowTitle($page);
        $title->workflowId = $workflowId;

        $container = new WorkflowStatusChangeContainer($page);
        $container->workflowStatus = $workflowStatus;
        $container->workflowId = $workflowId;
        //$container->redirectSite = WorkflowSearchEngineSite::$site;
        $container->redirectSite = WorkflowItemSite::$site;
        $container->appendWorkflowParameter = true;

        $page->render();

    }

}