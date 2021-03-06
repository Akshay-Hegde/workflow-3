<?php

namespace Nemundo\Workflow\App\Message\Data\MessageImage;
class MessageImageRow extends \Nemundo\Model\Row\AbstractModelDataRow
{
    /**
     * @var \Nemundo\Model\Row\AbstractModelDataRow
     */
    private $row;

    /**
     * @var MessageImageModel
     */
    public $model;

    /**
     * @var string
     */
    public $id;

    /**
     * @var \Nemundo\Model\Reader\Property\File\ImageReaderProperty
     */
    public $image;

    public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model)
    {
        parent::__construct($row->getData());
        $this->row = $row;
        $this->id = $this->getModelValue($model->id);
        $this->image = new \Nemundo\Model\Reader\Property\File\ImageReaderProperty($row, $model->image);
    }
}