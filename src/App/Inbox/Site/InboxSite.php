<?php

namespace Nemundo\Workflow\App\Inbox\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Inbox\Widget\InboxWidget;

class InboxSite extends AbstractSite
{

    /**
     * @var InboxSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Inbox';
        $this->url = 'app-inbox';

        new InboxRedirectSite($this);
        new InboxArchiveSite($this);

    }


    protected function registerSite()
    {
        InboxSite::$site= $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        new InboxWidget($page);


        $page->render();


    }


}