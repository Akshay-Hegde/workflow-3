<?php

namespace Nemundo\Workflow\App\Wiki\Content\Type;


use App\App\IssueTracking\Content\Type\Status\IssueErfassungStatus;

class IssueWikiContentType extends IssueErfassungStatus
{

    use WikiContentTypeTrait;

    public function saveType()
    {
        parent::saveType(); // TODO: Change the autogenerated stub

        $this->saveWikiContent();

    }

}