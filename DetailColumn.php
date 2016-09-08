<?php
namespace nhockizi\widgets;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

class DetailColumn extends \yii\base\Object
{
    public $queryParams = [];
    public $url;
    public $method;
    public $label;
    public $options = [];
    public $data = null;
    public $render;
    public $confirm;
    public $searchable;
    public $orderable;
    public $typeView = 'page';
    public $ajax = false;
    public function init()
    {
        $this->searchable = false;
        $this->orderable = false;
        if (empty($this->options['id'])) {
            $this->options['id'] = 'link';
        }
        if (!isset($this->render)) {
            $this->render = new JsExpression('function format ( d ) {
                return \''.$this->label.'\';
            }');
        }
    }
}