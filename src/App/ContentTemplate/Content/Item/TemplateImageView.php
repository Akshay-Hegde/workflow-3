<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Item;


use Nemundo\App\Content\View\AbstractContentView;
use Nemundo\Com\Html\Basic\Div;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Workflow\App\ContentTemplate\Data\ContentTemplateImage\ContentTemplateImageReader;

class TemplateImageView extends AbstractContentView
{

    public function getHtml()
    {

        $reader = new ContentTemplateImageReader();
        $row = $reader->getRowById($this->dataId);

        $div = new Div($this);

        $img = new BootstrapResponsiveImage($div);
        $img->src = $row->image->getImageUrl($reader->model->imageAutoSize800);

        return parent::getHtml();

    }

}