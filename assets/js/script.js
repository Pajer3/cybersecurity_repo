document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        let errors = [];
        const name = document.getElementById('naam').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('bericht').value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        const oldError = document.getElementById('form-errors');
        if (oldError) oldError.remove();

        if (name === '') {
            errors.push('Naam mag niet leeg zijn.');
        }
        if (!emailPattern.test(email)) {
            errors.push('E-mailadres is ongeldig.');
        }
        if (message === '') {
            errors.push('Bericht mag niet leeg zijn.');
        }

        if (errors.length > 0) {
            e.preventDefault();
            const ul = document.createElement('ul');
            ul.id = 'form-errors';
            ul.style.color = '#d32f2f';
            ul.style.marginBottom = '18px';
            errors.forEach(function (err) {
                const li = document.createElement('li');
                li.textContent = err;
                ul.appendChild(li);
            });
            form.parentNode.insertBefore(ul, form);
        }
    });
});