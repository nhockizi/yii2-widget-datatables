<?php
namespace nhockizi\datatables;
use yii\web\AssetBundle;

class DataTablesTableToolsAsset extends AssetBundle 
{
    public $sourcePath = '@bower/datatables-tabletools'; 
    public $css = [
        "css/dataTables.tableTools.css",
    ];
    public $js = [
        "js/dataTables.tableTools.js",
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'fedemotta\datatables\DataTablesAsset',
    ];
}