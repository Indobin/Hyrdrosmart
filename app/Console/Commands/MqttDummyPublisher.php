<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
class MqttDummyPublisher extends Command
{
    protected $signature = 'mqtt:publish-dummy';
    protected $description = 'Publish dummy sensor data to MQTT';

    public function handle()
    {
        $server = env('MQTT_HOST', 'broker.emqx.io');
        $port = env('MQTT_PORT', 1883);
        $clientId = 'dummy_publisher_' . uniqid();
        
        $mqtt = new MqttClient($server, $port, $clientId);
        
        $connectionSettings = (new ConnectionSettings)
            ->setUsername(env('MQTT_USERNAME'))
            ->setPassword(env('MQTT_PASSWORD'));
            
        $mqtt->connect($connectionSettings, true);
        
        $this->info("Publishing dummy data to MQTT broker...");
        $this->info("Press Ctrl+C to stop.");
        
        while (true) {
            $temperature = rand(20, 30) + (rand(0, 10) / 10);
            $humidity = rand(40, 70) + (rand(0, 10) / 10);
            
            $payload = json_encode([
                'temperature' => $temperature,
                'humidity' => $humidity,
                'timestamp' => now()->toDateTimeString()
            ]);
            
            $mqtt->publish('iot/sensors', $payload, 0, false);
            $this->info("Published: {$payload}");
            
            sleep(3); 
        }
        
        $mqtt->disconnect();
    }
}