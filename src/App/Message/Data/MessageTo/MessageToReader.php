<?php

namespace Nemundo\Workflow\App\Message\Data\MessageTo;
class MessageToReader extends \Nemundo\Model\Reader\ModelDataReader
{
    /**
     * @var MessageToModel
     */
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new MessageToModel();
    }

    /**
     * @return MessageToRow[]
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
     * @return MessageToRow
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
     * @return MessageToRow
     */
    public function getRowById($id)
    {
        return parent::getRowById($id);
    }

    private function getModelRow($dataRow)
    {
        $row = new MessageToRow($dataRow, $this->model);
        $row->model = $this->model;
        return $row;
    }
}