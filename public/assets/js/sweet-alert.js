function swalConfirmDelete(id, confirmText, successText) {
  Swal.fire({
    title: 'Konfirmasi',
    text: confirmText,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal',
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('destroy-form-' + id).submit();
      Swal.fire({
        title: 'Sukses',
        text: successText,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 0,
        timerProgressBar: true,
        onBeforeOpen: () => {
          const content = Swal.getContent();
          if (content) {
            const b = content.querySelector('b');
            if (b) {
              b.textContent = Swal.getTimerLeft();
            }
          }
        }
      });
    }
  });
}

function swalConfirmStore(confirmText, successText, redirectUrl) {
  // Get the form element
  const form = document.getElementById('save-form');

  // Check if the form is valid
  if (!form.checkValidity()) {
    // If the form is invalid, display an alert message
    Swal.fire({
      title: 'Info',
      text: 'Data masih ada yang kosong, lengkapi data yang diperlukan',
      icon: 'info',
      confirmButtonText: 'OK',
    });
    return;
  }

  // If the form is valid, proceed with form submission
  Swal.fire({
    title: 'Konfirmasi',
    text: confirmText,
    icon: 'info',
    showCancelButton: true,
    confirmButtonText: 'Ya',
    cancelButtonText: 'Batal',
  }).then((result) => {
    if (result.isConfirmed) {
      form.submit();
      Swal.fire({
        title: 'Sukses',
        text: successText,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true,
        onBeforeOpen: () => {
          const content = Swal.getContent();
          if (content) {
            const b = content.querySelector('b');
            if (b) {
              b.textContent = Swal.getTimerLeft();
            }
          }
        },
      }).then(() => {
        if (redirectUrl) {
          window.location.href = redirectUrl;
        }
      });
    }
  });
}

function swalConfirmUpdate(confirmText, successText, redirectUrl) {
  // Get the form element
  const form = document.getElementById('update-form');

  // Check if the form is valid
  if (!form.checkValidity()) {
    // If the form is invalid, display an alert message
    Swal.fire({
      title: 'Info',
      text: 'Data masih ada yang kosong, lengkapi data yang diperlukan',
      icon: 'info',
      confirmButtonText: 'OK',
    });
    return;
  }

  // If the form is valid, proceed with the update confirmation
  Swal.fire({
    title: 'Konfirmasi',
    text: confirmText,
    icon: 'info',
    showCancelButton: true,
    confirmButtonText: 'Ya',
    cancelButtonText: 'Batal',
  }).then((result) => {
    if (result.isConfirmed) {
      // If confirmed, perform the update action
      form.submit();
      Swal.fire({
        title: 'Sukses',
        text: successText,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true,
        onBeforeOpen: () => {
          const content = Swal.getContent();
          if (content) {
            const b = content.querySelector('b');
            if (b) {
              b.textContent = Swal.getTimerLeft();
            }
          }
        },
      }).then(() => {
        if (redirectUrl) {
          window.location.href = redirectUrl;
        }
      });
    }
  });
}