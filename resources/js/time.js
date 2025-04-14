function updateDateTime(params) {
    const now = new Date();

    const optionDate ={
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        timeZone : 'Asia/Jakarta'
    };

    const optionTime = {
        hour: '2-digit',
        minute: '2-digit',
        // second: '2-digit',
        hour12: false,
        timeZone : 'Asia/Jakarta'
    };

    const date = now.toLocaleDateString('id-ID', optionDate);
    const time = now.toLocaleTimeString('id-ID', optionTime);

    // const dateParts = date.split(',')[1];

    // document.getElementById('time').innerText =  `${time} WIB`;
    document.getElementById('date').innerText =  `${date}`;

}
setInterval(updateDateTime, 1000);
updateDateTime();
