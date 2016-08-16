<?php
namespace nhockizi\widgets;

use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Inflector;

class DataTables extends \yii\base\Widget
{
	const COLUMN_TYPE_DATE = 'date';
    const COLUMN_TYPE_NUM = 'num';
    const COLUMN_TYPE_NUM_FMT = 'num-fmt';
    const COLUMN_TYPE_HTML_NUM = 'html-num';
    const COLUMN_TYPE_HTML_NUM_FMT = 'html-num-fmt';
    const COLUMN_TYPE_STRING = 'string';
    const PAGING_SIMPLE = 'simple';
    const PAGING_SIMPLE_NUMBERS = 'simple_numbers';
    const PAGING_FULL = 'full';
    const PAGING_FULL_NUMBERS = 'full_numbers';
    protected $_options = [];
    public $id;
    /**
     * @var array Html options for table
     */
    public $tableOptions = ["class"=>"table table-bordered datatable","cellspacing"=>"0", "width"=>"100%"];
    public function init()
    {
        parent::init();
        DataTablesAsset::register($this->getView());
        $this->initColumns();
    }
    public function run()
    {
        $id = isset($this->id) ? $this->id : $this->getId();
        echo Html::beginTag('table', ArrayHelper::merge(['id' => $id], $this->tableOptions));
        echo Html::endTag('table');
        $this->getView()->registerJs(
            'var '.$id.' = $("#' . $id . '").DataTable(' . Json::encode($this->getParams()) . ');
            $("#'.$id.' tbody").on("click", "button", function () {
                console.log("ss");
            } );'
        );
    }
    protected function getParams()
    {
        return $this->_options;
    }
    protected function initColumns()
    {
        if (isset($this->_options['columns'])) {
            foreach ($this->_options['columns'] as $key => $value) {
                if (is_string($value)) {
                    $this->_options['columns'][$key] = ['data' => $value, 'title' => Inflector::camel2words($value)];
                }
                if (isset($value['type'])) {
                    if ($value['type'] == 'link') {
                        $value['class'] = LinkColumn::className();
                    }
                }
                if (isset($value['class'])) {
                    $column = \Yii::createObject($value);
                    $this->_options['columns'][$key] = $column;
                }
            }
        }
    }
    public function __set($name, $value)
    {
        return $this->_options[$name] = $value;
    }
    public function __get($name)
    {
        return isset($this->_options[$name]) ? $this->_options[$name] : null;
    }
}
