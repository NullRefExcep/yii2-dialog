# yii2-dialog

Yii2 module for dialogs (WIP)

[![Latest Stable Version](https://poser.pugx.org/nullref/yii2-dialog/v/stable)](https://packagist.org/packages/nullref/yii2-dialog) 
[![Total Downloads](https://poser.pugx.org/nullref/yii2-dialog/downloads)](https://packagist.org/packages/nullref/yii2-dialog) 
[![Latest Unstable Version](https://poser.pugx.org/nullref/yii2-dialog/v/unstable)](https://packagist.org/packages/nullref/yii2-dialog) 
[![License](https://poser.pugx.org/nullref/yii2-dialog/license)](https://packagist.org/packages/nullref/yii2-dialog)


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
composer require --prefer-dist nullref/yii2-dialog
```

or add

```
"nullref/yii2-dialog": "*"
```

to the require section of your `composer.json` file.

Then add module to application config:
```php
...
'modules' => [
...
    'dialog' => [
        'class' => 'nullref\dialog\Module',
        'components' => [
            'userManager' => [
                'class' => 'nullref\dialog\components\UserManager',
                'modelClass' => 'your User model class',
            ],
        ],
    ],
...
],
...
```

User model class must implements `nullref\dialog\interfaces\UserModel`.


## Usage


You can use dialog widget(nullref\dialog\widgets\Dialog):

```php
<?= nullref\dialog\widgets\Dialog::widget([
    'dialog' => $dialog, // instance of Dialog model (nullref\dialog\models\Dialog)
    'user' => Yii::$app->user->getIdentity(), //instance of current user
    'canWrite' => true, // allows write messages
    'canDelete' => true, // allows delete own messages
]) ?>
```


