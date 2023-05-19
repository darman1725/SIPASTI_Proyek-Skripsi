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
  