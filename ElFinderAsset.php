<?php

/**
 * @copyright Copyright (c) 2013-2017 Sajflow Services
 * @link https://www.sajflow.com
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

namespace tecsin\elfinder;

use yii\web\AssetBundle;

/**
 * REGISTERS ASSETS FOR ELFINDER
 *
 * @author Samuel Onyijne <samuel@sajflow.com>
 */

class ElFinderAsset extends AssetBundle
{
    public $sourcePath = '@vendor/studio-42/elfinder/';

    public $depends = [
        'tecsin\elfinder\BootstrapLibreICONSAsset',
    ];
    
    public function init()
    {
        parent::init();
        if (class_exists('yii\jui\JuiAsset')) {
              $this->depends[] = 'yii\jui\JuiAsset';
        } elseif (class_exists('yii\web\JqueryAsset')){
            $this->depends[] = 'yii\web\JqueryAsset';
            $this->js[] = '//code.jquery.com/ui/1.12.1/jquery-ui.js';
        } else {
            $this->js[] = '//code.jquery.com/jquery-1.12.4.js';
            $this->js[] = '//code.jquery.com/ui/1.12.1/jquery-ui.js';
        }
        $this->js[] = YII_DEBUG ? 'js/elfinder.full.js' : 'js/elfinder.min.js';
        $this->css[] =  YII_DEBUG ? 'css/elfinder.min.css' : 'css/elfinder.full.css';
        $this->css[] = '//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css';
        $this->css[] = 'css/theme.css';
    }
   
   
}
