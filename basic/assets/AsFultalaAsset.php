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
class AsFultalaAsset extends AssetBundle
{
    /* класс для подключения стилей и скриптов используется в зависимостях в AppAssets*/
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/plugins/slick.min.js',
        'js/plugins/jqueryui.min.js',
        'js/plugins/scrollup.min.js',
        'js/plugins/ajax-contact.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'grozzzny\depends\bootstrap4\Bootstrap4Asset',
        'grozzzny\depends\bootstrap4\Bootstrap4PluginAsset',
        '\yii\web\JqueryAsset'
    ];
}
