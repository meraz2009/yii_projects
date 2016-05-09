<?php
class UrlRules{
    public static function getUrlRules()
    {
        return array(
        'urlFormat'=>'path',

        'rules'=>array(
            '<controller:\w+>/<id:\d+>'=>'<controller>/view',
            '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
            '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            'logInUserInfo/<action:\w+>'=>'logInUserInfo/<action>',
            'testing'=>array('site/getfeed'),

        ),
            'showScriptName'=>false,
            'caseSensitive'=>false,
    );

    }
}