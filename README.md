# yii2-ueditor
Baidu UEditor For Yii2

# 安装
使用 composer，在命令行下使用以下命令：

```php
composer require "yadjet/yii2-ueditor:dev-master" 
```

#使用
```php
<?=
\yadjet\editor\UEditor::widget([
    'form' => $form,
    'model' => $model,
    'attribute' => 'content',
])
?>
```

Wechat SDK 详细的使用方法请参考 [overtrue/wechat 使用手册](https://github.com/overtrue/wechat/wiki)
