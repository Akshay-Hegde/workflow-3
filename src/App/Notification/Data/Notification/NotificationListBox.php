<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class NotificationListBox extends \Nemundo\Package\Bootstrap\FormElement\BootstrapModelListBox {
/**
* @var NotificationModel
*/
public $model;

protected function loadCom() {
parent::loadCom();
$this->model = new NotificationModel();
$this->label = $this->model->label;
}
}