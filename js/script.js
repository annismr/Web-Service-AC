document.getElementById('booking-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const serviceType = document.getElementById('service-type').value;
    let price = 0;

    switch (serviceType) {
        case 'cuci':
            price = 100000;
            break;
        case 'isi-freon':
            price = 150000;
            break;
        case 'check':
            price = 50000;
            break;
        case 'jual-beli':
            price = 200000;
            break;
    }

    document.getElementById('price').innerText = price;
    this.submit(); // Mengirim form setelah menampilkan harga
});

document.getElementById('ask-button').addEventListener('click', function() {
    const question = document.getElementById('user-question').value;
    const questionsDiv = document.getElementById('questions');
    questionsDiv.innerHTML += `<p>${question}</p>`;
    document.getElementById('user-question').value = '';
});

