<?php

declare(strict_types=1);

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\Repositories\MemoryRepository;

return [

    'default_connection' => 'hivemq',

   
    'connections' => [
        'hivemq' => [
            'host' => env('MQTT_HOST'),
            'port' => (int) env('MQTT_PORT', 8883),
            'username' => env('MQTT_USERNAME'),
            'password' => env('MQTT_PASSWORD'),
            'use_tls' => true,
            'tls_verify_peer' => false,
            'tls_verify_peer_name' => false,
            'protocol' => MqttClient::MQTT_3_1, // atau MqttClient::MQTT_3_1_1
            'client_id' => env('MQTT_CLIENT_ID', 'laravel-'.bin2hex(random_bytes(5))),
            'clean_session' => false,
            'keepalive' => 60,
            'connection_timeout' => 60,
            'resend_timeout' => 5,
            'socket_timeout' => 5,
            'last_will_topic' => null,
            'last_will_message' => null,
            'last_will_quality_of_service' => 0,
            'last_will_retain' => false,
        ],
    ],

];