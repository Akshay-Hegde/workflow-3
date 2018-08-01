<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\Workflow\App\ContentTemplate\Content\Form\ImageContentTemplateForm;
use Nemundo\Workflow\App\ContentTemplate\Content\Item\TemplateImageItem;
use Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage\ContentTemplateImageModel;
use Nemundo\Workflow\App\Workflow\Content\Type\WorkflowIdTrait;

class ImageTemplateContentType extends AbstractDataContentType  // AbstractContentType
{

    //use WorkflowIdTrait;

    protected function loadData()
    {
        $this->name = 'Bild';
        $this->id = '265611fc-189f-4d8d-85cf-0b96edad40ef';
        $this->modelClass = ContentTemplateImageModel::class;
        $this->itemClass = TemplateImageItem::class;
        $this->formClass = ImageContentTemplateForm::class;
    }

}