<?php
namespace nhockizi\widgets;

use yii\web\AssetBundle;

class DataTablesResponsiveAsset extends AssetBundle
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
            'library/css/responsive.dataTables.css'
        ];
        $this->js = [
            'library/js/dataTables.responsive.js'
        ];
    }
} 