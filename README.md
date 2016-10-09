# yii2-dialog

Yii2 module for dialogs (WIP)


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
        'userManager' => [
            'class' => 'nullref\dialog\components\UserManager',
            'modelClass' => 'your User model class',
        ],
    ],
...
],
...
```

User model class must implements `nullref\dialog\interfaces\UserModel`.



