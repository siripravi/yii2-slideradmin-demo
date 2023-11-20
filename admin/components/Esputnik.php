<?php

namespace app\admin\components;

use yii\base\Component;
use yii\httpclient\Client;

/**
 * Class Esputnik
 * @package app\admin\components
 *
 * @property $username string
 * @property $password string
 */
class Esputnik extends Component
{
    public $username;

    public $password;

    public function event($type, $email, $data)
    {
        (new Client())->createRequest()
            ->setMethod('POST')
            ->setUrl('https://esputnik.com/api/v1/event')
            ->setFormat(Client::FORMAT_JSON)
            ->setData([
                'eventTypeKey' => $type,
                'keyValue' => $email,
                'params' => [
                    [
                        'name' => 'EmailAddress',
                        'value' => $email,
                    ],
                    [
                        'name' => 'json',
                        'value' => json_encode($data, JSON_UNESCAPED_UNICODE),
                    ],
                ],
            ])
            ->setHeaders([
                'Authorization' => 'Basic ' . base64_encode("$this->username:$this->password"),
            ])
            ->send();
    }
}