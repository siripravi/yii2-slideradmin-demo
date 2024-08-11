<?php

namespace app\modules\v1\controllers;

use app\modules\catalog\Currency;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'post', attachables: [new OA\Attachable(),])]
class CurrencyController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\modules\catalog\models\Currency';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        return $behaviors;
    }

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs['custom'] = ['GET'];
        $verbs['view'] = ['GET'];
        return $verbs;
    }

    public function actionCustom()
    {
        $post = new Currency();
       /* 'id' => 'ID',
        'code' => 'Code',
        'rate' => 'Rate',
        'primary' => 'Primary',
        'position' => 'Position',
        'enabled' => 'Enabled',
        'name' => 'Name',
        'before_name' => 'Before name',
        'after_name' => 'After name',*/
        $post->code = "GBP";
        $post->rate = "2.5";
        $post->name = "Great Briton Pound";
        $post->save();
        return [
            'post' => $post,
            'message' => 'custom'
        ];
    }

    #[OA\Get(path: '/currency', tags: ['currency'], operationId: 'Get All Currencies', responses: [
        new OA\Response(response: 'default', description: 'Default response'),
    ])]
    #[OA\Response(null, 200, '')]
    public function actionIndex()
    {
        return parent::actionIndex();
    }

    #[OA\Get(path: '/currency/{id}', tags: ['currency'], operationId: 'Get single', responses: [
        new OA\Response(response: 'default', description: 'Default response'),
    ])]
    #[OA\Response(null, 200, '')]
    public function actionView()
    {
        return parent::actionView(1);
    }

   
}
