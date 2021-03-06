<?php

namespace Nemundo\Workflow\Com\TrafficLight;


use Nemundo\Com\Html\Basic\Div;
use Nemundo\Com\Html\Color\HtmlColor;

class ColorCircle extends Div
{
    /**
     * @var int
     */
    public $size = 20;
    /**
     * @var string
     */
    public $color = HtmlColor::WHITE;

    public function getHtml()
    {
        $style = 'background: ' . $this->color . ';border-radius: 50%;width: ' . $this->size . 'px;height: ' . $this->size . 'px; border-style: solid;border; border-width: 1px;';
        $this->addAttribute('style', $style);
        return parent::getHtml();
    }
}