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
        // $this->css[] = 'datatables-plugins/integration/jqueryui/dataTables.jqueryui.css';
        // $this->css[] = 'nhockizi-datatables/library/css/editor.bootstrap.min.css';
        // $this->js[] = 'nhockizi-datatables/library/js/dataTables.editor.js';
        // $this->js[] = 'nhockizi-datatables/library/js/editor.bootstrap.min.js';
    }
} 