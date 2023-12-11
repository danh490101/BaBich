function successToast(message) {
    toastr.clear();
    NioApp.Toast(message, 'success', {
        position: 'top-right'
    });
}

function errorSwal(message) {
    let title = "Lỗi!";
    Swal.fire(title, message, "error");
}
