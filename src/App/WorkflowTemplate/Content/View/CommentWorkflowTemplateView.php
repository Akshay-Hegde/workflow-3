<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\View;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Basic\Paragraph;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentReader;

class CommentWorkflowTemplateView extends AbstractContentView
{

    public function getHtml()
    {

        $row = (new CommentReader())->getRowById($this->dataId);

        $p = new Paragraph($this);
        $p->content = $row->comment;


        return parent::getHtml(); // TODO: Change the autogenerated stub
    }

}