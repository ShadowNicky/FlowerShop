<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'css/style.css',
        'css/plugins/ionicons.min.css',
        'css/plugins/jqueryui.min.css',
        'css/plugins/animation.css',
        'css/plugins/slick.css',

        //'css/vendor/bootstrap.min.css',
        'css/vendor/ionicons.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'grozzzny\depends\bootstrap4\Bootstrap4Asset',
        'grozzzny\depends\bootstrap4\Bootstrap4PluginAsset',
    ];
}
