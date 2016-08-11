<?php
namespace nhockizi\datatables;
use yii\web\AssetBundle;

class DataTablesAsset extends AssetBundle 
{
    public $sourcePath = '@bower/nhockizi-datatables'; 
    public $css = [
        "library/css/jquery.dataTables.css",
    ];
    public $js = [
        "library/js/jquery.dataTables.js",
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}