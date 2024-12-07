document.addEventListener('DOMContentLoaded', function() {
    // Máscara para o campo de telefone
    const telefoneInput = document.getElementById('telefone');
    
    if (telefoneInput) {
        telefoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            let formattedValue = '';
            
            if (value.length <= 11) {
                if (value.length > 2) {
                    formattedValue += '(' + value.substring(0, 2) + ') ';
                    if (value.length > 7) {
                        formattedValue += value.substring(2, 7) + '-';
                        formattedValue += value.substring(7, 11);
                    } else {
                        formattedValue += value.substring(2);
                    }
                } else {
                    formattedValue = value;
                }
                
                e.target.value = formattedValue;
            }
        });
    }

    // Animação suave para mensagens de alerta
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 300);
        }, 3000);
    });
});