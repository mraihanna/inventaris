// notif aja
const flashDataMenu = $('.flash-data-menu').data('flashdata');
if (flashDataMenu) {
    Swal.fire({
        title : 'Data Menu',
        padding:'2em',
        text  : 'New Menu Has Been ' + flashDataMenu,
        icon  : 'success'
    });
}

// confirm
  $('.tombol-hapus-role').on('click', function(e) {
    e.preventDefault();
  
    const href = $(this).attr('href')
  
    Swal.fire({
        title: 'Are you sure?',
        padding:'2em',
        text: "Data Employee Will Active or Deactive",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
  });
  
  $('.tombol-hapus-menu').on('click', function(e) {
    e.preventDefault();
  
    const href = $(this).attr('href')
  
    Swal.fire({
        title: 'Are you sure?',
        padding:'2em',
        text: "Data Menu will Deleted",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
  });
  
  $('.tombol-hapus-submenu').on('click', function(e) {
    e.preventDefault();
  
    const href = $(this).attr('href')
  
    Swal.fire({
        title: 'Are you sure?',
        padding:'2em',
        text: "Data Sub Menu will Deleted",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
  });

  function submitFormTarget(form){
    Swal.fire({
        title: 'Are you sure?',
        padding:'2em',
        text: "Data Target Will Be Added",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, add it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
    return false;
}