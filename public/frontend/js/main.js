// Datepicker
$(document).ready(function () {
    $(".datepicker").datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true,
    });
});

// Keysup otomatis autofill
// function isi_otomatis(){
// $("#name").focusout('click', function(e){
// alert($(this).val());
// $(document).ready(function() {
//     $.ajaxSetup({
//       headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       }
//     });

//     $("input[name='name']").keypress(function(e){
//         var name = $(this).val();
//         $.ajax({
//             url: "{{ url('editkonfirmasi') }}",
//             data: {'name':name},
//             dataType: 'json',
//             success : function(data) {
//                 $('#email').val(data.email);
//                 $('#no_hp').val(data.no_hp);
//                 $('#alamat').val(data.alamat);
//             },
//             // error: function(response) {
//             //     alert(response.responseJSON.message);
//             // }
//         });
//     });
//   })

function isi_otomatis() {
    var id = $("#name input[name='name']").attr("id");
    console.log(id);
    $.get("{{ url('editkonfirmasi') }}" + "/" + id, function (data) {
        $("#alamat").val(data.alamat);
        $("#email").val(data.email);
        $("#no_hp").val(data.no_hp);
    });
}

// Scroll Up
const scrollToTop = document.getElementById("pageUp");
let dataShow = false;

window.addEventListener("scroll", () => {
    if (window.scrollY > 300 && !dataShow) {
        scrollToTop.setAttribute("data-show", "true");
        dataShow = true;
    }
    if (window.scrollY < 300 && dataShow) {
        scrollToTop.setAttribute("data-show", "false");
        dataShow = false;
    }
});

$("#pageUp").on("click", function () {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
});

//   Preloader
var delay = 100;
$(document).ready(function () {
    setTimeout(function () {
        $(".preloader").fadeOut();
    }, delay);
});

$(document).ready(function () {
    window.setTimeout(function () {
        $(".alert")
            .fadeTo(500, 0)
            .slideUp(500, function () {
                $(this).remove();
            });
    }, 4000);
});

//Click event handler for nav-items
$(".nav-link").on("click", function () {
    //Remove any previous active classes
    $(".nav-link").removeClass("active");

    //Add active class to the clicked item
    $(this).addClass("active");
});

$(window).on("load", function () {
    $(".hMuncul").addClass("horizontals");
});
