README

This extension provides the DataTables integration for the Yii2 framework.

Latest Stable Version Total Downloads Latest Unstable Version License

Installation

The preferred way to install this extension is through composer.

With Composer installed, you can then install the extension using the following commands:

composer global require "fxp/composer-asset-plugin:~1.0.0"
composer require --prefer-dist nhockizi/yii2-widget-datatables "*"
The first command installs the composer asset plugin which allows managing bower and npm package dependencies through Composer. You only need to run this command once for all. The second command installs the datatables widget.

You can also add (instead of the second command):

"nhockizi/yii2-widget-datatables": "*"
to the require section of your composer.json file.

Usage

Use DataTables as any other other Yii2 widget.

use nhockizi\datatables\DataTables;
<?php
    $searchModel = new ModelSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
?>
<?= DataTables::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        //columns

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);?>
This extension uses the Bootstrap integration plugin to provide a Yii2 style by default.

The TableTools plugin is also available. Specify the DOM and the tableTools settings in the clientOptions array as the following example.

...
'clientOptions' => [
    "lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
    "info"=>false,
    "responsive"=>true, 
    "dom"=> 'lfTrtip',
    "tableTools"=>[
        "aButtons"=> [  
            [
            "sExtends"=> "copy",
            "sButtonText"=> Yii::t('app',"Copy to clipboard")
            ],[
            "sExtends"=> "csv",
            "sButtonText"=> Yii::t('app',"Save to CSV")
            ],[
            "sExtends"=> "xls",
            "oSelectorOpts"=> ["page"=> 'current']
            ],[
            "sExtends"=> "pdf",
            "sButtonText"=> Yii::t('app',"Save to PDF")
            ],[
            "sExtends"=> "print",
            "sButtonText"=> Yii::t('app',"Print")
            ],
        ]
    ]
],
...
You can also use DataTables in the JavaScript layer of your application. To achieve this, you need to include DataTables as a dependency of your Asset file. In this case, you could use yii\grid\GridView or using the datatables options retrieve => true to avoid errors. In both case all options must be in the Javascript object.

public $depends = [
...
'nhockizi\datatables\DataTablesAsset',
...
];