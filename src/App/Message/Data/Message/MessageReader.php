<?php

namespace Nemundo\Workflow\App\Message\Data\Message;
class MessageReader extends \Nemundo\Model\Reader\ModelDataReader
{
    /**
     * @var MessageModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageModel();
    }

    /**
     * @return MessageRow[]
     */
    public function getData()
    {
        $this->addFieldByModel($this->model);
        $this->checkExternal($this->model);
        $list = [];
        foreach (parent::getData() as $dataRow) {
            $row = $this->getModelRow($dataRow);
            $list[] = $row;
        }
        return $list;
    }

    /**
     * @return MessageRow
     */
    public function getRow()
    {
        $this->addFieldByModel($this->model);
        $this->checkExternal($this->model);
        $dataRow = parent::getRow();
        $row = $this->getModelRow($dataRow);
        return $row;
    }

    /**
     * @return MessageRow
     */
    public function getRowById($id)
    {
        return parent::getRowById($id);
    }

    private function getModelRow($dataRow)
    {
        $row = new MessageRow($dataRow, $this->model);
        $row->model = $this->model;
        return $row;
    }
}