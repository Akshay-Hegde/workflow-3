<?php

namespace Nemundo\Workflow\App\Wiki\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Workflow\App\Message\ContentType\ImageContentType;
use Nemundo\Workflow\App\Message\ContentType\TextContentType;
use Nemundo\Workflow\App\Wiki\Application\WikiApplication;
use Nemundo\Workflow\App\Wiki\Collection\WikiContentTypeCollection;
use Nemundo\Workflow\App\Wiki\ContentType\HyperlinkContentType;
use Nemundo\Workflow\App\Wiki\ContentType\MailContentType;
use Nemundo\Workflow\App\Wiki\ContentType\WikiPageContainer;
use Nemundo\Workflow\App\Wiki\ContentType\WikiNewsContentType;
use Nemundo\Workflow\App\Wiki\Data\WikiCollection;
use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\Workflow\App\Wiki\Setup\WikiContentTypeSetup;

class WikiInstall extends AbstractScript
{
    public function run()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new WikiCollection());

        $setup = new ApplicationSetup();
        $setup->addApplication(new WikiApplication());

        $setup = new ContentTypeSetup();
        //$setup->addContentType(new WikiPageContainer());
        //$setup->addContentTypeCollection(new WikiContentTypeCollection());

        $setup = new WikiContentTypeSetup();
        $setup->addContentType(new TextContentType());
        $setup->addContentType(new ImageContentType());

        //$setup->addContentType(new MailContentType());
        /*$setup->addContentType(new HyperlinkContentType());
        $setup->addContentType(new WikiContentType());
        $setup->addContentType(new WikiNewsContentType());*/


    }
}