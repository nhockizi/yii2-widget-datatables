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
    public $table_class = '';
    /**
     * @var array Html options for table
     */
    public $tableOptions = ["class"=>"display responsive nowrap","cellspacing"=>"0", "width"=>"100%"];
    public function init()
    {
        parent::init();
        DataTablesAsset::register($this->getView());
        $this->initColumns();
    }
    public function run()
    {
        if($this->table_class != ''){
            $this->tableOptions["class"] = $this->table_class;
            DataTablesResponsiveAsset::register($this->getView());
        }
        $id = isset($this->id) ? $this->id : $this->getId();
        echo Html::beginTag('table', ArrayHelper::merge(['id' => $id], $this->tableOptions));
        echo Html::endTag('table');
        $option = '';
        $fields = '';
        foreach ($this->_options as $key => $value) {
            if(is_array($value)):
                if($key == 'fields'):
                    $fields .= $key.':[';
                    foreach ($value as $a => $b) {
                        $fields .= "{ ";
                        foreach ($b as $c => $d) {
                            $fields .= $c.": '".$d."',";
                        }
                        $fields .= "}, ";
                    }
                    $fields .= '],';
                elseif($key == 'select'):
                    $option .= $key.':{';
                    foreach ($value as $k => $v) {
                        $option .= $k.": '".$v."',";
                    }
                    $option .= '},';
                else:
                    $option .= $key.':[';
                    foreach ($value as $a => $b) {
                        $option .= "{ ";
                        foreach ($b as $c => $d) {
                            if($c === 'editor' || $c === 'action' || $c === 'render' || $c === 'formMessage'){
                                $option .= $c.": ".$d." , ";
                            }else{
                                $option .= $c.": '".$d."' , ";
                            }
                        }
                        $option .= "}, ";
                    }
                    $option .= '],';
                endif;
            else:
                if($value == 'true' || $value == 'false' || $value == 'null'):
                    $option .= $key." : ".$value.",";
                else:
                    $option .= $key." : '".$value."',";
                endif;
            endif;
        }
        $this->getView()->registerJs("
                var table = $('#".$id."').DataTable( {
                    ".$option."
                });
            ");
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
                }else{
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
