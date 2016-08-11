<?php
namespace nhockizi\widgets;

use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class DataTables extends \yii\grid\GridView
{
	public $options = [];
	public $tableOptions = ["class"=>"table table-striped table-bordered","cellspacing"=>"0", "width"=>"100%"];
	public $clientOptions = [];

	public function init()
    {
        parent::init();
        $this->filterModel = null;
        $this->dataProvider->sort = false;
        $this->dataProvider->pagination = false;
        $this->layout = "{items}";
        if (!isset($this->tableOptions['id'])) {
            $this->tableOptions['id'] = 'datatables_'.$this->getId();
        }
    }

	public function run()
    {
        $clientOptions = $this->getClientOptions();
        $view = $this->getView();
        $id = $this->tableOptions['id'];
        DataTablesBootstrapAsset::register($view);
        $options = Json::encode($clientOptions);
        $view->registerJs("$('#$id').DataTable($options);");
        if ($this->showOnEmpty || $this->dataProvider->getCount() > 0) {
            $content = preg_replace_callback("/{\\w+}/", function ($matches) {
                $content = $this->renderSection($matches[0]);
                return $content === false ? $matches[0] : $content;
            }, $this->layout);
        } else {
            $content = $this->renderEmpty();
        }
        echo $content;
    }
    
	protected function getClientOptions()
    {
        return $this->clientOptions;
    }
}
