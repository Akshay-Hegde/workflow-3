<?php

namespace Nemundo\Workflow\App\Workflow\Parameter;


use Nemundo\Web\Http\Parameter\AbstractUrlParameter;

class DraftEditParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'draft-edit';
    }

}