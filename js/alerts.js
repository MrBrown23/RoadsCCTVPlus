function confirmDelete(id,is_supplier){
  if (is_supplier==1) {
    Swal.fire({
      title: 'Are you sure you want to delete this supplier account?',
      text: 'Once you delete this account, you can not undo it.',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      confirmButtonColor: '#DD6B55',
      customClass: {
        actions: 'my-actions',
        cancelButton: 'order-2',
        confirmButton: 'order-1',
      }
    }).then((result) => {
      if (result.isConfirmed) {

        window.location.href = "process.php?deleteSupplier="+id;

    }})
  }
  else if (is_supplier==2) {
    Swal.fire({
      title: 'Are you sure you want to delete this video?',
      text: 'Once you delete this video, you can not undo it.',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      confirmButtonColor: '#DD6B55',
      customClass: {
        actions: 'my-actions',
        cancelButton: 'order-2',
        confirmButton: 'order-1',
      }
    }).then((result) => {
      if (result.isConfirmed) {

        window.location.href = "process.php?deleteVideo="+id;

    }})
  }
  else{
    Swal.fire({
      title: 'Are you sure you want to decline this subscription request??',
      text: 'Once you decline, you can not undo it.',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      confirmButtonColor: '#DD6B55',
      customClass: {
        actions: 'my-actions',
        cancelButton: 'order-2',
        confirmButton: 'order-1',
      }
    }).then((result) => {
      if (result.isConfirmed) {

        window.location.href = "process.php?delete="+id;

    }})
  }

}
