document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[data-contact-form]');
    if (!form) return;
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(form);
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;
        
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Відправка...';
        
        fetch('/send_form.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                form.reset();
            }
        })
        .catch(err => {
            alert('Помилка відправки. Спробуйте пізніше.');
            console.error(err);
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
        });
    });
});
