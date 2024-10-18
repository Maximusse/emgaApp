$(function(){

    window.addEventListener('success-toast-hide-modal',event => {
        const title = event.detail[0].title
        const msg = event.detail[0].msg
        const modal = event.detail[0].modal
        $(modal).modal('hide');
        Swal.fire({
            position: "center",
            icon: title,
            title: msg,
            showConfirmButton: false,
            timer: 1500
          });
    })

    

    window.addEventListener('show-modal',event => {
        const modal = event.detail[0].modal
        $(modal).modal('show');
    })

    window.addEventListener('hide-modal',event => {
        const modal = event.detail[0].modal
        $(modal).modal('hide');
    })

    

    
})