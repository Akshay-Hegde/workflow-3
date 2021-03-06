<?php

namespace Nemundo\Workflow\App\News\Content\Type;


use Nemundo\App\Content\Type\AbstractModelDataTreeContentType;
use Nemundo\Workflow\App\News\Data\Comment\CommentModel;
use Nemundo\Workflow\App\Stream\Builder\StreamBuilder;

class CommentContentTypeModelTree extends AbstractModelDataTreeContentType
{

    /**
     * @var string
     */
    public $newsId;

    protected function loadType()
    {
        $this->contentLabel = 'News Comment';
        $this->contentId = '3cf44cd4-a6ff-44b3-8c89-21770e62a39f';
        //$this->itemSite = CommentRedirectSite::$site;
        //$this->itemClass = CommentContentItem::class;
        $this->modelClass = CommentModel::class;
    }


    public function getForm($parentItem = null)
    {
        $form = parent::getForm($parentItem);

        //$form = (new CommentContentType())->getForm($page);
        $form->model->newsId->defaultValue = $this->newsId;

        return $form;

    }


    public function onCreate($dataId)
    {

        $builder = new StreamBuilder();
        $builder->contentType = $this;
        $builder->dataId = $dataId;
        $builder->createItem();

    }

}