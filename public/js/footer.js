$(function () {
    $('.only-numbers').on('keydown', '#telepon', function (e) {
        -1 !== $
            .inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/
            .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) ||
            35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) &&
            (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
    });
})

function inputTerbilang() {
    //membuat inputan otomatis jadi mata uang
    $('.mata-uang').mask('00.000.000.000.000', {
        reverse: true
    });

    //mengambil data uang yang akan dirubah jadi terbilang
    var input = document.getElementById("terbilang-input").value.replace(/\./g, "");

    //menampilkan hasil dari terbilang
    document.getElementById("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
}
