<?php

namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImageExternalType extends \Nemundo\Model\Type\External\ExternalType
{
    /**
     * @var \Nemundo\Model\Type\Id\IdType
     */
    public $id;

    /**
     * @var \Nemundo\Model\Type\File\ImageType
     */
    public $image;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->externalModelClassName = MessageImageModel::class;
        $this->externalTableName = "message_message_image";
        $this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->id = new \Nemundo\Model\Type\Id\IdType();
        $this->id->fieldName = "id";
        $this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
        $this->id->label = "Id";
        $this->addType($this->id);

        $this->image = new \Nemundo\Model\Type\File\ImageType();
        $this->image->fieldName = "image";
        $this->image->tableName = $this->parentFieldName . "_" . $this->externalTableName;
        $this->image->aliasFieldName = $this->image->tableName . "_" . $this->image->fieldName;
        $this->image->label = "Image";
        $this->addType($this->image);

    }
}