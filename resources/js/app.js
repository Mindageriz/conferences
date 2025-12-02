import 'bootstrap';

import Swal from 'sweetalert2';
window.Swal = Swal;

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.delete-form');
            window.Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: 'Yes, delete it'
            }).then((result) => {
                if(result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    const flash = document.getElementById('flash-success');
    if (flash && window.Swal) {
        const message = flash.dataset.message;
        window.Swal.fire({
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 1500
        });
        flash.remove();
    }
});

