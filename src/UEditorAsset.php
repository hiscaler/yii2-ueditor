<?php

namespace yadjet\editor;

class UEditorAsset extends AssetBundle
{

    public $languageFiles = [
        'en', 'zh-cn'
    ];
    public $sourcePath = '@vendor/yadjet/editor/assets';
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
