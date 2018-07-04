<?php

namespace Nemundo\Workflow\Content\Collection;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Workflow\Content\Type\AbstractContentType;

abstract class AbstractContentTypeCollection extends AbstractBase
{

    /**
     * @var AbstractContentType[]
     */
    private $contentTypeList;

    abstract protected function loadCollection();

    public function __construct()
    {
        $this->loadCollection();
    }


    protected function addContentType(AbstractContentType $contentType)
    {

        $this->contentTypeList[] = $contentType;
        return $this;

    }


    public function getContentTypeList()
    {
        return $this->contentTypeList;
    }


}