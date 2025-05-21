const mqtt = require('mqtt');

// Konfigurasi MQTT (sama dengan kode subscribe)
const mqtt_server = 'mqtts://c0de53e703a5465ab6b49950a133bbe9.s1.eu.hivemq.cloud';
const mqtt_port = 8883;
const mqtt_user = 'hivemq.webclient.1745923132814';
const mqtt_password = '5nd.,D801JH&U%CahFqv';
const mqtt_topic_publish = 'perintah/siram'; // Topik untuk publish

const options = {
  clientId: 'mqtt-client-publisher-js',
  username: mqtt_user,
  password: mqtt_password,
  protocol: 'mqtts',
  port: mqtt_port,
  rejectUnauthorized: false,
};

// Membuat koneksi MQTT
const publisher = mqtt.connect(mqtt_server, options);

// Ketika berhasil terkoneksi
publisher.on('connect', function () {
  console.log('Publisher connected to HiveMQ Cloud!');

  // Contoh: Publish data setiap 5 detik (simulasi)
  setInterval(() => {
    const payload = {
      suhu: Math.random() * 30 + 20, // Nilai acak 20-50°C
      kelembaban_tanah: Math.random() * 100 // Nilai acak 0-100%
    };

    publisher.publish(
      mqtt_topic_publish,
      JSON.stringify(payload),
      { qos: 1 }, // QoS 1 untuk guaranteed delivery
      (err) => {
        if (err) {
          console.error('Publish error:', err);
        } else {
          console.log(`Published to ${mqtt_topic_publish}:`, payload);
        }
      }
    );
  }, 5000); // Interval 5 detik
});

// Error handling
publisher.on('error', function (err) {
  console.error('Publisher MQTT Error:', err);
});