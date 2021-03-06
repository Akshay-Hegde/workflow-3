<?php

namespace Nemundo\Workflow\App\Message\ContentType;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\Message\ContentItem\TextContentView;
use Nemundo\Workflow\App\Message\Data\MessageText\MessageTextForm;
use Nemundo\Workflow\App\Message\Data\MessageText\MessageTextModel;

class TextContentType extends AbstractContentType
{

    protected function loadType()
    {
        $this->contentLabel = 'Text';
        $this->contentId = 'be649b42-4818-4c9e-b778-212c71aa90f0';
        $this->viewClass = TextContentView::class;
        //$this->formClass = MessageTextForm::class;

        $this->modelClass = MessageTextModel::class;

    }



    /*
    public function onMessageCreate($messageId, $dataId)
    {

        $count = new MessageItemCount();
        $count->filter->andEqual($count->model->messageId, $messageId);
        $messageCount = $count->getCount();

        $update = new MessageUpdate();
        $update->count = $messageCount;
        $update->updateById($messageId);


        $messageRow = (new MessageReader())->getRowById($messageId);
        $textRow = (new MessageTextReader())->getRowById($dataId);


        $builder = new NotificationBuilder();
        $builder->contentType = new MessageContentType();
        $builder->dataId = $messageId;
        $builder->subject = $messageRow->subject;
        $builder->message = $textRow->text;
        $builder->createUsergroupInbox(new SchleunigerUsergroup());


    }*/


    //public function onCreate($dataId)
    // {

    /*
    $reader = new MessageItemReader();
    $reader->filter->andEqual($reader->model->dataId, $dataId);
    $row = (new MessageItemReader())->getRowById($da)


    $count = new MessageItemCount();
    $count->filter->andEqual($count->model->messageId, $this->messageId);
    $messageCount = $count->getCount();

    $update = new MessageUpdate();
    $update->count = $messageCount;
    $update->updateById($this->messageId);*/


    //}

}