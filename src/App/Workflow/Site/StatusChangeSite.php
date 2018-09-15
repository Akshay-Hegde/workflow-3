<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Data\ContentType\ContentTypeReader;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\Workflow\Builder\WorkflowItem;
use Nemundo\Workflow\App\Workflow\Container\Change\WorkflowStatusChangeContainer;
use Nemundo\Com\Html\Hyperlink\Hyperlink;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Workflow\App\Workflow\Event\WorkflowEvent;
use Nemundo\Workflow\App\Workflow\Com\Title\WorkflowTitle;
use Nemundo\Workflow\App\Workflow\Data\WorkflowStatus\WorkflowStatusReader;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowStatusParameter;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractDataListWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractFormWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;


class StatusChangeSite extends AbstractSite
{

    /**
     * @var StatusChangeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'status-change';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        StatusChangeSite::$site = $this;
    }


    public function loadContent()
    {


        //$workflowStatusId = (new WorkflowStatusParameter())->getValue();

        //$workflowStatusRow = (new ContentTypeReader())->getRowById($workflowStatusId);

        /** @var AbstractWorkflowStatus|AbstractDataListWorkflowStatus|AbstractFormWorkflowStatus $workflowStatus */
        $workflowStatus = (new ContentTypeParameter())->getContentType();

        //$workflowStatus = $workflowStatusRow->getContentTypeClassObject();


        $workflowParameter = new WorkflowParameter();
        $workflowId = $workflowParameter->getValue();

        $workflowItem = new WorkflowItem($workflowId);

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $breadcrumb = new BootstrapBreadcrumb($page);
        $breadcrumb->addItem(WorkflowSite::$site);

        $site = clone(WorkflowSite::$site);
        $site->title = $workflowItem->getProcess()->contentName;
        $site->addParameter(new ProcessParameter($workflowItem->getProcess()->contentId));
        $breadcrumb->addItem($site);


        $site = clone(WorkflowItemSite::$site);
        $site->title = $workflowItem->getTitle();
        $site->addParameter($workflowParameter);
        $breadcrumb->addItem($site);

        $breadcrumb->addActiveItem($workflowStatus->contentName);


        $title = new AdminTitle($page);
        $title->content = $workflowItem->getWorkflowNumber();


        //(new Debug())->write('adsf'.$workflowItem->getProcess());

        $p = new Paragraph($page);
        $p->content = $workflowItem->getProcess()->description;

        $title = new AdminTitle($page);
        $title->content = $workflowItem->getSubject();


        //$title = new WorkflowTitle($page);
        //$title->workflowId = $workflowId;

        $redirectSite = WorkflowItemSite::$site;
        $redirectSite->addParameter(new WorkflowParameter($workflowId));


        $event = new WorkflowEvent();
        $event->workflowStatus = $workflowStatus;
        $event->workflowId = $workflowId;

        $form = $workflowStatus->getForm();

        if ($form == null) {
            $event->run(null);
            $redirectSite->redirect();
        } else {
            $page->addCom($form);
            //$form->afterSubmitEvent = $event;

            $form->afterSubmitEvent->addEvent($event);
            $form->redirectSite = $redirectSite;


        }


        $page->render();

    }

}