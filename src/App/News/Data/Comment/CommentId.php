<?php
namespace Nemundo\Workflow\App\News\Data\Comment;
use Nemundo\Model\Id\AbstractModelIdValue;
class CommentId extends AbstractModelIdValue {
/**
* @var CommentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CommentModel();
}
}