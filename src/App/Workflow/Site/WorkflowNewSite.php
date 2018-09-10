<?php

namespace Nemundo\Workflow\App\Workflow\Site;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Com\Html\Basic\H1;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Workflow\App\Workflow\Com\Title\ProcessTitle;
use Nemundo\Workflow\App\Workflow\Event\WorkflowStartEvent;
use Nemundo\Workflow\App\Workflow\Container\Start\WorkflowStartContainer;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessReader;
use Nemundo\Workflow\App\Workflow\Factory\WorkflowStatusFactory;
use Nemundo\Workflow\App\Workflow\Form\Change\WorkflowChangeForm;
use Nemundo\Workflow\App\Workflow\Form\Start\WorkflowStartForm;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;
use Nemundo\Workflow\Site\Inbox\WorkflowInboxSite;

class WorkflowNewSite extends AbstractSite
{

    /**
     * @var WorkflowNewSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'new';
        $this->menuActive = false;

    }


    protected function registerSite()
    {
        WorkflowNewSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $processParameter = new ProcessParameter();

        $processId = (new ProcessParameter())->getValue();
        $processRow = (new ProcessReader())->getRowById($processId);

        $process = $processRow->getProcessClassObject();

        $breadcrumb = new BootstrapBreadcrumb($page);
        $breadcrumb->addItem(WorkflowSite::$site);

        $site = clone(WorkflowSite::$site);
        $site->title = $process-> objectName;
        $site->addParameter($processParameter);
        $breadcrumb->addSite($site);
        //$breadcrumb->addActiveItem($process->process);

        $breadcrumb->addActiveItem('Neu');

        $title = new ProcessTitle($page);
        $title->process = $process;


        $form = $process->getForm($page);
        //$form->redirectToItemSite = true;



//        $event = new WorkflowStartEvent();
//        $event->process = $process;

//        $form->afterSubmitEvent->addEvent( $event);


        $form->redirectSite = clone(WorkflowSite::$site);
        $form->redirectSite->addParameter(new ProcessParameter($processId));


        /*
        $title = new AdminSubtitle($page);
        $title->content = $processRow->process;

        $p = new Paragraph($page);
        $p->content = $process->description;*/



        //$container = new WorkflowStartContainer($page);
        //$container->process = $process;





        /*$container->redirectSite = SearchItemSite::$site;
        $container->appendWorkflowParameter = true;*/

        //$container->redirectSite = clone(WorkflowSearchEngineSite::$site);
        //$container->redirectSite->addParameter(new ProcessParameter($processId));



        $page->render();

    }


}