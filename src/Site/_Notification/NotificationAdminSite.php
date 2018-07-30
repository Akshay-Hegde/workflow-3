<?php

namespace Nemundo\Workflow\Site\Notification;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Parameter\NotificationParameter;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Workflow\Data\UserNotification\UserNotificationReader;
use Nemundo\Workflow\App\Workflow\Parameter\WorkflowParameter;
use Nemundo\Workflow\Usergroup\WorkflowAdministratorUsergroup;


class NotificationAdminSite extends AbstractSite
{

    /**
     * @var NotificationAdminSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Notification (Admin)';
        $this->url = 'notification-admin';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new WorkflowAdministratorUsergroup());

    }


    protected function registerSite()
    {
        NotificationAdminSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        // User Search
        // nur Workflow Admin

        $form = new SearchForm($page);

        $formRow = new BootstrapFormRow($form);

        $userListBox = new UserListBox($formRow);
        $userListBox->submitOnChange = true;
        $userListBox->value = $userListBox->getValue();


        $table = new AdminClickableTable($page);


        $header = new TableHeader($table);
        $header->addText('Nr.');
        $header->addText('Betreff');
        $header->addText('Status');
        $header->addEmpty();

        $notificationReader = new UserNotificationReader();
        $notificationReader->model->loadStatusChange();
        $notificationReader->model->statusChange->loadWorkflowStatus();
        $notificationReader->model->statusChange->loadWorkflow();
        $notificationReader->model->statusChange->workflow->loadProcess();
        $notificationReader->filter->andEqual($notificationReader->model->userId, $userListBox->getValue());
        $notificationReader->addOrder($notificationReader->model->statusChange->workflow->itemOrder, SortOrder::DESCENDING);

        foreach ($notificationReader->getData() as $notificationRow) {

            $row = new BootstrapClickableTableRow($table);

            $number = $notificationRow->statusChange->workflow->workflowNumber . ' (' . $notificationRow->statusChange->workflow->process->process . ')';

            $row->addText($number);
            $row->addText($notificationRow->statusChange->workflow->subject);
            $row->addText($notificationRow->statusChange->workflowStatus->workflowStatusText);

            $site = $notificationRow->statusChange->workflow->process->getProcessClassObject()->getItemSite();  //$workflowRow->dataId);
            $site->addParameter(new WorkflowParameter($notificationRow->statusChange->workflowId));
            $row->addClickableSite($site);

            $site = clone(NotificationDeleteSite::$site);
            $site->addParameter(new NotificationParameter($notificationRow->id));
            $row->addHyperlinkIcon(new DeleteIcon(), $site);

        }

        $page->render();

    }

}