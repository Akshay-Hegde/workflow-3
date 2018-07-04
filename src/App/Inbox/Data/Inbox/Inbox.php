<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
class Inbox extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var InboxModel
*/
protected $model;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $dataId;

/**
* @var string
*/
public $bookmarkId;

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
* @var bool
*/
public $archive;

/**
* @var string
*/
public $contentRedirect;

public function __construct() {
parent::__construct();
$this->model = new InboxModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->bookmarkId, $this->bookmarkId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->message, $this->message);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->archive, $this->archive);
$this->typeValueList->setModelValue($this->model->contentRedirect, $this->contentRedirect);
$id = parent::save();
return $id;
}
}