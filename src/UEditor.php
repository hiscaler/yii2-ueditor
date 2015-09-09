<?php

namespace yadjet\editor;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use yii\widgets\InputWidget;

/**
 * UEditor 控件类
 *
 * @author hiscaler <hiscaler@gmail.com>
 */
class UEditor extends InputWidget
{

    /**
     * 表单对象
     * @var ActiveForm
     */
    public $form;
    public $htmlOptions = [];
    public $jsOptions = [];
    private $_jsOptions = [
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
            $this->htmlOptions['style'] = 'width: 612px; margin-left: 135px;';
        }
        if (!isset($this->htmlOptions['style'])) {
            $this->htmlOptions['style'] = 'width: 612px; margin-left: 135px;';
        }
    }

    public function run()
    {
        $id = $this->options['id'];
        $view = $this->getView();
        UEditorAsset::register($view);
        $jsOptions = array_merge($this->jsOptions, $this->_jsOptions);
        $js = "var ue = UE.getEditor('" . $id . "', " . ($jsOptions ? Json::encode($jsOptions) : '{}') . ");";
        $view->registerJs($js);
        if ($this->hasModel()) {
            return $this->form->field($this->model, $this->attribute)->textArea($this->htmlOptions);
        } else {
            return Html::textInput($this->name, $this->value, $this->htmlOptions);
        }
    }

}
