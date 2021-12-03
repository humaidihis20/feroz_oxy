"use strict";

$("#swal-1").click(function () {
    swal('Hello');
});

$("#swal-2").click(function () {
    swal('Good Job', 'You clicked the button!', 'success');
});

$("#swal-3").click(function () {
    swal('Good Job', 'You clicked the button!', 'warning');
});

$("#swal-4").click(function () {
    swal('Good Job', 'You clicked the button!', 'info');
});

$("#swal-5").click(function () {
    swal('Good Job', 'You clicked the button!', 'error');
});

$("#logout").click(function () {
    swal({
            title: 'Are you sure?',
            text: 'You will Logout from your account!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // swal('Poof! Your imaginary file has been deleted!', {
                //     icon: 'success',
                // });
                window.location.href = "/logout";
            } else {
                swal('Your still stay here!');
            }
        });
});

$("#swal-7").click(function () {
    swal({
        title: 'What is your name?',
        content: {
            element: 'input',
            attributes: {
                placeholder: 'Type your name',
                type: 'text',
            },
        },
    }).then((data) => {
        swal('Hello, ' + data + '!');
    });
});

$("#swal-8").click(function () {
    swal('This modal will disappear soon!', {
        buttons: false,
        timer: 3000,
    });
});
