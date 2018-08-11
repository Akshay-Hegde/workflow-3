<?php

namespace Nemundo\Workflow\App\Wiki\Site;

use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Data\ContentTree\ContentTreeReader;
use Nemundo\Com\Html\Basic\Br;
use Nemundo\Com\Html\Basic\Hr;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapDropdown;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Wiki\Action\WikiPageAction;
use Nemundo\Workflow\App\Wiki\Collection\WikiContentTypeCollection;
use Nemundo\Workflow\App\Wiki\Content\Form\WikiPageContentForm;
use Nemundo\Workflow\App\Wiki\Content\Type\WikiPageContentType;
use Nemundo\Workflow\App\Wiki\Data\Wiki\WikiReader;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageForm;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Workflow\App\Wiki\Parameter\WikiPageParameter;
use Nemundo\App\Content\Parameter\ContentTypeParameter;

class WikiSite extends AbstractSite
{

    /**
     * @var WikiSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Wiki';
        $this->url = 'wiki';

        new WikiNewSite($this);
        new WikiPageSite($this);
        new WikiRedirectSite($this);
        new WikiEditSite($this);
        new WikiItemDeleteSite($this);


    }


    protected function registerSite()
    {
        WikiSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        //$form = new WikiPageForm($page);
        //$form->model->action->addInsertAction(new WikiPageAction());

        //$form = new WikiPageContentForm($page);

        (new WikiPageContentType())->getForm($page);


        $list = new BootstrapHyperlinkList($page);

        $pageReader = new WikiPageReader();
        $pageReader->addOrder($pageReader->model->title);
        foreach ($pageReader->getData() as $pageRow) {
            $site = clone(WikiPageSite::$site);
            $site->title = $pageRow->title . ' (' . $pageRow->count . ') ' . $pageRow->url;
            $site->addParameter(new WikiPageParameter($pageRow->id));
            $list->addSite($site);
        }


        /*
        $treeReader = new ContentTreeReader();
        $treeReader->filter->andEqual($treeReader->model->contentTypeId, (new WikiPageContentType())->id);

        foreach ($treeReader->getData() as $treeRow) {
            //(new Debug())->write($treeRow->dataId);

            $item = (new WikiPageContentType())->getItem($page);
            $item->dataId = $treeRow->dataId;


        }*/


        $page->render();


    }
}