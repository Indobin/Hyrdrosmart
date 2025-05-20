const mqtt = require('mqtt');
const axios = require('axios');

// HiveMQ Cloud settings
const mqtt_server = 'mqtts://c0de53e703a5465ab6b49950a133bbe9.s1.eu.hivemq.cloud'; // ganti dengan server MQTT HiveMQ yang sesuai
const mqtt_port = 8883;  // Port untuk koneksi TLS/SSL
const mqtt_user = 'hivemq.webclient.1745923132814'; // Username
const mqtt_password = '5nd.,D801JH&U%CahFqv'; // Password
const mqtt_topic = 'suhu/kelembaban'; // Topik yang akan di-subscribe

// Pilihan TLS untuk koneksi aman
const options = {
  clientId: 'mqtt-client-js',
  username: mqtt_user,
  password: mqtt_password,
  protocol: 'mqtts', // Menunjukkan penggunaan TLS
  port: mqtt_port,
  rejectUnauthorized: false, // Nonaktifkan validasi sertifikat (hanya untuk testing)
};

// Membuat koneksi MQTT
const client = mqtt.connect(mqtt_server, options);

// Ketika berhasil terkoneksi ke broker MQTT
client.on('connect', function () {
  console.log('Connected to HiveMQ Cloud!');
  // Subscribe ke topik yang sesuai
  client.subscribe(mqtt_topic, function (err) {
    if (!err) {
      console.log(`Subscribed to topic: ${mqtt_topic}`);
    } else {
      console.error('Failed to subscribe:', err);
    }
  });
});

client.on('message', async function (topic, message) {
  const payload = message.toString();
  console.log('Received message:', payload);

  try {
    const data = JSON.parse(payload);
    console.log(`Suhu: ${data.suhu}°C, Kelembaban Tanah: ${data.kelembaban_tanah}%`);

    const response = await axios.post('http://127.0.0.1:8000/api/sensor', {
      suhu: data.suhu,
      kelembaban_tanah: data.kelembaban_tanah
    });

    console.log('Laravel response:', response.data);
  } catch (error) {
    console.error('POST error:', error.response?.data || error.message);
  }
});


// Error handling
client.on('error', function (err) {
  console.error('MQTT Error:', err);
});


