<?php
namespace App\Services;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
class MqttService
{
    protected $mqtt;
    public function __construct()
    {
        $server   = env('MQTT_HOST', 'broker.emqx.io');
        $port     = env('MQTT_PORT', 1883);
        $clientId = env('MQTT_CLIENT_ID', 'laravel_mqtt_client_' . uniqid());
        
        $this->mqtt = new MqttClient($server, $port, $clientId);
        
        $connectionSettings = (new ConnectionSettings)
            ->setUsername(env('MQTT_USERNAME'))
            ->setPassword(env('MQTT_PASSWORD'))
            ->setKeepAliveInterval(60);
            
        $this->mqtt->connect($connectionSettings, true);
    }
    
    public function subscribe($topic, callable $callback)
    {
        $this->mqtt->subscribe($topic, $callback, 0);
        $this->mqtt->loop(true);
    }
    
    public function publish($topic, $message)
    {
        $this->mqtt->publish($topic, $message, 0, false);
    }
    
    public function __destruct()
    {
        $this->mqtt->disconnect();
    }
}