<?php
namespace Nemundo\Workflow\App\Inbox\Data\Inbox;
class InboxExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Workflow\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Id\UniqueIdType
*/
public $bookmarkId;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $message;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $archive;

/**
* @var \Nemundo\Model\Type\Php\PhpClassType
*/
public $contentRedirect;

protected function loadType() {
parent::loadType();
$this->externalModelClassName = InboxModel::class;
$this->externalTableName = "inbox_inbox";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->contentTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentTypeId->aliasFieldName = $this->contentTypeId->tableName ."_".$this->contentTypeId->fieldName;
$this->contentTypeId->label = "Content Type";
$this->addType($this->contentTypeId);

$this->dataId = new \Nemundo\Model\Type\Id\UniqueIdType();
$this->dataId->fieldName = "data_id";
$this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
$this->dataId->label = "Data Id";
$this->addType($this->dataId);

$this->bookmarkId = new \Nemundo\Model\Type\Id\UniqueIdType();
$this->bookmarkId->fieldName = "bookmark_id";
$this->bookmarkId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->bookmarkId->aliasFieldName = $this->bookmarkId->tableName . "_" . $this->bookmarkId->fieldName;
$this->bookmarkId->label = "Bookmark Id";
$this->addType($this->bookmarkId);

$this->subject = new \Nemundo\Model\Type\Text\TextType();
$this->subject->fieldName = "subject";
$this->subject->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->subject->aliasFieldName = $this->subject->tableName . "_" . $this->subject->fieldName;
$this->subject->label = "Subject";
$this->addType($this->subject);

$this->message = new \Nemundo\Model\Type\Text\LargeTextType();
$this->message->fieldName = "message";
$this->message->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->message->aliasFieldName = $this->message->tableName . "_" . $this->message->fieldName;
$this->message->label = "Message";
$this->addType($this->message);

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->archive = new \Nemundo\Model\Type\Number\YesNoType();
$this->archive->fieldName = "archive";
$this->archive->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->archive->aliasFieldName = $this->archive->tableName . "_" . $this->archive->fieldName;
$this->archive->label = "Archive";
$this->addType($this->archive);

$this->contentRedirect = new \Nemundo\Model\Type\Php\PhpClassType();
$this->contentRedirect->fieldName = "content_redirect";
$this->contentRedirect->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentRedirect->aliasFieldName = $this->contentRedirect->tableName . "_" . $this->contentRedirect->fieldName;
$this->contentRedirect->label = "Content Redirect";
$this->addType($this->contentRedirect);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Workflow\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_content_type");
$this->contentType->fieldName = "content_type";
$this->contentType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentType->aliasFieldName = $this->contentType->tableName ."_".$this->contentType->fieldName;
$this->contentType->label = "Content Type";
$this->addType($this->contentType);
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
}