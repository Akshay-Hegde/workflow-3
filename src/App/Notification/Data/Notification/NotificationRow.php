<?php
namespace Nemundo\Workflow\App\Notification\Data\Notification;
class NotificationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $contentTypeId;

/**
* @var \Nemundo\App\Content\Data\ContentType\ContentTypeRow
*/
public $contentType;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $message;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\App\User\Data\User\UserRow
*/
public $user;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeCreated;

/**
* @var bool
*/
public $read;

/**
* @var bool
*/
public $archive;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->dataId = $this->getModelValue($model->dataId);
$this->contentTypeId = $this->getModelValue($model->contentTypeId);
if ($model->contentType !== null) {
$this->loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model->contentType);
}
$this->subject = $this->getModelValue($model->subject);
$this->message = $this->getModelValue($model->message);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoAppUserDataUserUseruserRow($model->user);
}
$this->dateTimeCreated = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeCreated));
$this->read = $this->getModelValue($model->read);
$this->archive = $this->getModelValue($model->archive);
}
private function loadNemundoAppContentDataContentTypeContentTypecontentTypeRow($model) {
$this->contentType = new \Nemundo\App\Content\Data\ContentType\ContentTypeRow($this->row, $model);
}
private function loadNemundoAppUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\App\User\Data\User\UserRow($this->row, $model);
}
}