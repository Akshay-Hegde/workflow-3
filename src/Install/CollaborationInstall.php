<?php

namespace Nemundo\Workflow\Install;


use Nemundo\App\Content\Install\ContentInstall;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\User\Setup\UsergroupSetup;
use Nemundo\Workflow\App\Calendar\Install\CalendarInstall;
use Nemundo\Workflow\App\ContentTemplate\Install\ContentTemplateInstall;
use Nemundo\Workflow\App\Favorite\Install\FavoriteInstall;
use Nemundo\Workflow\App\Identification\Install\IdentificationInstall;
use Nemundo\Workflow\App\Inbox\Install\InboxInstall;
use Nemundo\Workflow\App\Message\Install\MessageInstall;
use Nemundo\Workflow\App\PersonalCalendar\Install\PersonalCalendarInstall;
use Nemundo\Workflow\App\PersonalTask\Install\PersonalTaskInstall;
use Nemundo\Workflow\App\SearchEngine\Install\SearchEngineInstall;
use Nemundo\Workflow\App\Subscription\Install\SubscriptionInstall;
use Nemundo\Workflow\App\Task\Install\TaskInstall;
use Nemundo\Workflow\App\ToDo\Install\ToDoInstall;
use Nemundo\Workflow\App\Widget\Install\WidgetInstall;
use Nemundo\Workflow\App\Wiki\Install\WikiInstall;
use Nemundo\Workflow\App\Workflow\Install\WorkflowInstall;
use Nemundo\Workflow\Usergroup\CollaborationUsergroup;

class CollaborationInstall extends AbstractScript
{

    public function run()
    {

        (new ContentInstall())->run();

        (new WorkflowInstall())->run();
        (new CalendarInstall())->run();
        (new InboxInstall())->run();
        (new TaskInstall())->run();
        (new WikiInstall())->run();
        (new MessageInstall())->run();
        (new IdentificationInstall())->run();
        (new WidgetInstall())->run();
        (new PersonalTaskInstall())->run();
        (new PersonalCalendarInstall())->run();
        (new SearchEngineInstall())->run();
        (new WidgetInstall())->run();
        (new ToDoInstall())->run();
        (new ContentTemplateInstall())->run();
        (new SubscriptionInstall())->run();
        (new FavoriteInstall())->run();

        $setup = new UsergroupSetup();
        $setup->addUsergroup(new CollaborationUsergroup());


    }


}