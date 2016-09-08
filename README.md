DataTables widget for Yii2
===========================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

With Composer installed, you can then install the extension using the following commands:

    composer global require "fxp/composer-asset-plugin:~1.0.0"
    composer require --prefer-dist nhockizi/yii2-widget-datatables "dev-master"

The first command installs the [composer asset plugin](https://github.com/francoispluchino/composer-asset-plugin/)
which allows managing bower and npm package dependencies through Composer. You only need to run this command
once for all. The second command installs the datatables widget.

You can also add (instead of the second command):

```
"nhockizi/yii2-widget-datatables": "dev-master"
```

to the require section of your `composer.json` file.

