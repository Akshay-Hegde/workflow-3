<?php

namespace Nemundo\Workflow\App\UserConfig\Config;


use Nemundo\User\Type\UserSessionType;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigText;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigTextCount;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigTextUpdate;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigText\UserConfigTextValue;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo\UserConfigYesNo;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo\UserConfigYesNoCount;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo\UserConfigYesNoUpdate;
use Nemundo\Workflow\App\UserConfig\Data\UserConfigYesNo\UserConfigYesNoValue;

abstract class AbstractYesNoUserConfig extends AbstractUserConfig
{

    /**
     * @var bool
     */
    public $defaultValue = false;

    public function setValue($value)
    {

        $count = new UserConfigYesNoCount();
        $count->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
        $count->filter->andEqual($count->model->userConfigId, $this->configId);
        if ($count->getCount() == 0) {

            $data = new UserConfigYesNo();
            $data->userId = (new UserSessionType())->userId;
            $data->userConfigId = $this->configId;
            $data->value = $value;
            $data->save();

        } else {

            $update = new UserConfigYesNoUpdate();
            $update->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
            $update->filter->andEqual($count->model->userConfigId, $this->configId);
            $update->value = $value;
            $update->update();

        }


    }


    public function getValue()
    {

        $value = $this->defaultValue;

        $count = new UserConfigYesNoCount();
        $count->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
        $count->filter->andEqual($count->model->userConfigId, $this->configId);
        if ($count->getCount() == 1) {

            $configValue = new UserConfigYesNoValue();
            $configValue->field = $configValue->model->value;
            $configValue->filter->andEqual($count->model->userId, (new UserSessionType())->userId);
            $configValue->filter->andEqual($count->model->userConfigId, $this->configId);
            $value = $configValue->getValue();

        }

        return $value;

    }


}