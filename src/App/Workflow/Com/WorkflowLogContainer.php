<?php

namespace Nemundo\Workflow\App\Workflow\Com;


use App\App\IssueTracking\Site\IssueEditSite;
use App\App\IssueTracking\Site\IssueStatusChangeSite;
use Nemundo\Admin\Com\Button\AdminButton;
use Nemundo\App\Content\Parameter\ContentTypeParameter;
use Nemundo\App\Content\Parameter\DataIdParameter;
use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Package\Bootstrap\Layout\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Workflow\App\Workflow\Com\Button\DraftReleaseButton;
use Nemundo\Workflow\App\Workflow\Data\StatusChange\StatusChangeReader;
use Nemundo\Workflow\App\Workflow\Parameter\DraftEditParameter;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;

class WorkflowLogContainer extends AbstractHtmlContainerList
{

    /**
     * @var string
     */
    public $workflowId;

    public function getHtml()
    {

        //$h3 = new H5($this);
        //$h3->content = 'Verlauf';

        $row = new BootstrapRow($this);

        $colLeft = new BootstrapColumn($row);
        $colLeft->columnWidth = 2;

        $colRight = new BootstrapColumn($row);
        $colRight->columnWidth = 10;

        $list = new BootstrapHyperlinkList($colLeft);

        $statusChangeReader = new StatusChangeReader();
        $statusChangeReader->model->loadWorkflowStatus();
        $statusChangeReader->model->loadUser();
        $statusChangeReader->filter->andEqual($statusChangeReader->model->workflowId, $this->workflowId);

        foreach ($statusChangeReader->getData() as $statusChangeRow) {

            $list->addHyperlink($statusChangeRow->workflowStatus->contentType, '#' . $statusChangeRow->dataId);

            $div = new Div($colRight);
            $div->addCssClass('card');
            $div->addCssClass('mb-3');


            $statusText = $statusChangeRow->workflowStatus->contentType . ': ' . $statusChangeRow->user->displayName . ' ' . $statusChangeRow->dateTime->getShortDateTimeLeadingZeroFormat();

            if ($statusChangeRow->draft) {
                $statusText .= ' (Entwurf)';
            }

            $headerDiv = new Div($div);
            $headerDiv->addCssClass('card-header');
            $headerDiv->content = $statusText;

            $contentDiv = new Div($div);
            $contentDiv->addCssClass('card-body');

            $workflowStatus = $statusChangeRow->workflowStatus->getContentTypeClassObject();

            $item = $workflowStatus->getItem($contentDiv);
            $item->dataId = $statusChangeRow->dataId;

            /*
            $btn = new AdminButton($contentDiv);
            $btn->content = 'Bearbeiten';
            $btn->site = clone(IssueEditSite::$site);
            $btn->site->addParameter(new ContentTypeParameter($statusChangeItem->workflowStatusId));
            $btn->site->addParameter(new DataIdParameter($statusChangeItem->dataId));*/


            if ($statusChangeRow->draft) {

                $btn = new AdminButton($contentDiv);
                $btn->content = 'Draft Edit';
                $btn->site = clone(IssueStatusChangeSite::$site);
                $btn->site->addParameter(new ContentTypeParameter($statusChangeRow->workflowStatusId));
                $btn->site->addParameter(new DataIdParameter($statusChangeRow->dataId));
                $btn->site->addParameter(new DraftEditParameter());
                $btn->site->addParameter(new WorkflowParameter($statusChangeRow->workflowId));


                $btn = new DraftReleaseButton($contentDiv);
                $btn->workflowId = $statusChangeRow->workflowId;




            }


            /*
            if ($statusChangeItem->draft) {

                $btn = new AdminButton($contentDiv);
                $btn->content = 'Bearbeiten';
                $btn->site = clone($this->statusChangeRedirectSite);
                //$btn->site->addParameter(new WorkflowStatusParameter($statusChangeItem->workflowStatus->id));
                $btn->site->addParameter(new ContentTypeParameter($statusChangeItem->workflowStatus->id));
                $btn->site->addParameter(new WorkflowParameter($workflowId));
                $btn->site->addParameter(new DraftEditParameter($statusChangeItem->dataId));

                if ($workflowStatus->isObjectOfClass(AbstractDataListWorkflowStatus::class)) {
                    $btn = new DraftReleaseButton($contentDiv);
                    $btn->workflowId = $workflowId;
                }
            }*/

        }

        return parent::getHtml();
    }

}