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
    public $sourcePath = '@bower/nhockizi-library';
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    public function init()
    {
        parent::init();
        $this->css = [
            'css/jquery.dataTables.css',
            'css/buttons.dataTables.css',
            'css/select.dataTables.css',
        ];
        $this->js = [
            'js/jquery.dataTables.js',
            'js/dataTables.buttons.js',
            'js/dataTables.select.js',
            'js/dataTables.editor.js',
            'js/editor.bootstrap.js',
        ];
    }
} 