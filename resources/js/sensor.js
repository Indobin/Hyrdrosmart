import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Echo.channel('sensor-channel')
    .listen('SensorDataUpdated', (data) => {
        console.log('Data updated:', data);
        document.getElementById('temperature').innerText = data.temperature;
        document.getElementById('humidity').innerText = data.humidity;
        document.getElementById('last-updated').innerText = new Date().toLocaleTimeString();
    });