<?php

namespace yadjet\editor;

use Yii;
use yii\web\AssetBundle;

/**
 * 编辑器资源发布
 *
 * @package yadjet\editor
 * @author hiscaler <hiscaler@gmail.com>
 */
class UEditorAsset extends AssetBundle
{

    public $languageFiles = [
        'en', 'zh-cn'
    ];

    public $sourcePath = '@vendor/yadjet/yii2-ueditor/src/assets';

    public $css = [];

    public $js = [
        'ueditor.config.js',
        'ueditor.all.min.js',
    ];

    public function registerAssetFiles($view)
    {
        $language = strtolower(Yii::$app->language);
        $language = in_array($language, $this->languageFiles) ? $language : 'en';
        $this->js[] = "lang/{$language}/{$language}.js";
        parent::registerAssetFiles($view);
    }

}
