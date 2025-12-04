import 'bootstrap';

import Swal from 'sweetalert2';
window.Swal = Swal;

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.delete-form');
            const title   = this.dataset.confirmTitle || 'Are you sure?';
            const text    = this.dataset.confirmText || 'This action cannot be undone.';
            const confirm = this.dataset.confirmConfirm || 'Delete';
            const cancel = this.dataset.confirmCancel || 'Cancel';
            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: cancel,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: confirm,
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

