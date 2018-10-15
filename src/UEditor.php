<?php

namespace yadjet\editor;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * UEditor 控件类
 *
 * @author hiscaler <hiscaler@gmail.com>
 */
class UEditor extends InputWidget
{

    /**
     * @var \yii\widgets\ActiveForm 表单对象
     */
    public $form;

    /**
     * @var array 表单控件（textarea）属性
     */
    public $htmlOptions = [];

    /**
     * @var null|false|string 标签
     */
    public $label = null;

    /**
     * @var array js 属性
     */
    public $jsOptions = [];

    /**
     * @var array 默认 js 属性
     */
    private $_defaultJsOptions = [
        'toolbars' => [
            [
                'fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                'directionalityltr', 'directionalityrtl', 'indent', '|',
                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                'simpleupload', 'insertimage', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'pagebreak', 'template', 'background', '|',
                'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                'print', 'preview', 'searchreplace', 'drafts'
            ]
        ],
    ];

    public function init()
    {
        parent::init();
        if (!isset($this->htmlOptions['class'])) {
            $this->htmlOptions['class'] = 'editor';
        }
    }

    public function run()
    {
        $id = $this->options['id'];
        $view = $this->getView();
        UEditorAsset::register($view);
        $jsOptions = array_merge($this->jsOptions, $this->_defaultJsOptions);
        $view->registerJs("var ue = UE.getEditor('$id', " . Json::encode($jsOptions) . ");");
        if ($this->hasModel()) {
            return $this->form->field($this->model, $this->attribute, $this->options)->textarea($this->htmlOptions)->label($this->label);
        } else {
            return Html::textInput($this->name, $this->value, $this->htmlOptions);
        }
    }

}
