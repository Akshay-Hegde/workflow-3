<?php

namespace Nemundo\Workflow\Content\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Content\Data\ContentType\ContentType;
use Nemundo\Workflow\Content\Type\AbstractContentType;

class ContentTypeSetup extends AbstractBase
{


    public function addContentType(AbstractContentType $contentType)
    {

        $data = new ContentType();
        $data->updateOnDuplicate = true;
        $data->id = $contentType->id;
        $data->contentType = $contentType->name;
        $data->contentTypeClass = $contentType->getClassName();
        $data->save();


    }


}