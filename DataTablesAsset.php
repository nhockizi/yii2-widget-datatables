<?php
namespace nhockizi\widgets;

use yii\web\AssetBundle;

class DataTablesAsset extends AssetBundle
{
    const STYLING_DEFAULT = 'default';
    const STYLING_BOOTSTRAP = 'bootstrap';
    const STYLING_JUI = 'jqueryui';
    public $styling = self::STYLING_DEFAULT;
    public $fontAwesome = false;
    public $sourcePath = '@bower';
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    public function init()
    {
        parent::init();
        $this->css = [
            'css/jquery.dataTables.min.css',
            'css/responsive.dataTables.min.css',
            'css/buttons.dataTables.min.css',
            'css/select.dataTables.min.css',
        ];
        $this->js = [
            'js/jquery.dataTables.min.js',
            'js/dataTables.responsive.min.js',
            'js/dataTables.buttons.min.js',
            'js/dataTables.select.min.js',
            'js/dataTables.editor.js',
            'js/editor.bootstrap.min.js',
        ];
    }
} 