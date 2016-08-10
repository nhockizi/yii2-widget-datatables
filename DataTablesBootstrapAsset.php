<?php
namespace nhockizi\datatables;
use yii\web\AssetBundle;

class DataTablesBootstrapAsset extends AssetBundle 
{
    public $sourcePath = '@bower/datatables-bootstrap3'; 
    public $css = [
        "BS3/assets/css/datatables.css",
    ];
    public $js = [
        "BS3/assets/js/datatables.js",
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'fedemotta\datatables\DataTablesAsset',
    ];
}