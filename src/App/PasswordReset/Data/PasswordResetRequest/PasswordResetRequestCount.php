<?php
namespace Nemundo\Workflow\App\PasswordReset\Data\PasswordResetRequest;
class PasswordResetRequestCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PasswordResetRequestModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PasswordResetRequestModel();
}
}