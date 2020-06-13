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
{/* класс для подключения стилей и скриптов*/
    public $basePath = '@webroot';/*путь от  которого  отсчитывать  относительность*/
    public $baseUrl = '@web';/*адрес от  которого  отсчитывать  относительность*/
    public $css = [/*список   css  файлов  которые необходимо  подключить  к   сайту*/
//        'css/site.css',
        'css/style.css',
        'css/plugins/ionicons.min.css',
        'css/plugins/jqueryui.min.css',
        'css/plugins/animation.css',
        'css/plugins/slick.css',

        //'css/vendor/bootstrap.min.css',
        'css/vendor/ionicons.min.css',
    ];
    public $js = [/*список   css  файлов  которые необходимо  подключить  к   сайту*/
        'js/main.js'
    ];
    public $depends = [/*список зависимостей  от которых  зависит  текущий набор    они  влияют на  позицию  в  подключения для js файлов*/
        'yii\web\YiiAsset',
        'grozzzny\depends\bootstrap4\Bootstrap4Asset',
        'grozzzny\depends\bootstrap4\Bootstrap4PluginAsset',
        '\app\assets\AsFultalaAsset',
    ];
}
