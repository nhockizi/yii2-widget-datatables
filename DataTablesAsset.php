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
    public $sourcePath = '@bower/nhockizi-datatables';
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    public function init()
    {
        parent::init();
        $this->css = [
            'library/css/jquery.dataTables.css',
            'library/css/responsive.dataTables.css',
            'library/css/buttons.dataTables.css',
            'library/css/select.dataTables.css',
        ];
        $this->js = [
            'library/js/jquery.dataTables.js',
            'library/js/dataTables.responsive.js',
            'library/js/dataTables.buttons.js',
            'library/js/dataTables.select.js',
            'library/js/dataTables.editor.js',
            'library/js/editor.bootstrap.js',
        ];
    }
} 