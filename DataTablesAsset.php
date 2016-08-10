<?php
namespace nhockizi\datatables;
use yii\web\AssetBundle;

class DataTablesAsset extends AssetBundle 
{
    public $sourcePath = '@bower/datatables'; 
    public $css = [
        "media/css/jquery.dataTables.css",
    ];
    public $js = [
        "media/js/jquery.dataTables.js",
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}