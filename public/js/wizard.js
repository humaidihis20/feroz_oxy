$(document).ready(function () {
    $('.btn-wizard').click(function () {
        var menu = $(this).attr('id');
        if (menu == "next-button") {
            var element = document.getElementById("nomor_invoice");
            var element2 = document.getElementById("aplikasi");
            element.classList.remove("wizard-step-active");
            element2.classList.add("wizard-step-active");
            $('#back-mid-button').show();
            $('#next-mid-button').show();
            $('#next-button').hide();
            $('#save-button').hide();
            $('#back-button').hide();
            $('.nomor-faktur').hide(1200);
            $('.about-aplikasi').show(1200);
            $('.total-harga').hide(1200);
        }
        if (menu == "back-mid-button") {
            var element = document.getElementById("nomor_invoice");
            var element2 = document.getElementById("aplikasi");
            element2.classList.remove("wizard-step-active");
            element.classList.add("wizard-step-active");
            $('#back-button').hide();
            $('#next-button').show();
            $('#next-mid-button').hide();
            $('#back-mid-button').hide();
            $('#save-button').hide();
            $('.nomor-faktur').show(1200);
            $('.about-aplikasi').hide(1200);
            $('.total-harga').hide(1200);
        }
        if (menu == "next-mid-button") {
            var element = document.getElementById("harga-total");
            var element2 = document.getElementById("aplikasi");
            element2.classList.remove("wizard-step-active");
            element.classList.add("wizard-step-active");
            $('#back-button').show();
            $('#save-button').show();
            $('#next-mid-button').hide();
            $('#back-mid-button').hide();
            $('#next-button').hide();
            $('.nomor-faktur').hide(1200);
            $('.about-aplikasi').hide(1200);
            $('.total-harga').show(1200);
        }
        if (menu == "back-button") {
            var element = document.getElementById("harga-total");
            var element2 = document.getElementById("aplikasi");
            element.classList.remove("wizard-step-active");
            element2.classList.add("wizard-step-active");
            $('#back-mid-button').show();
            $('#next-mid-button').show();
            $('#save-button').hide();
            $('#next-button').hide();
            $('#back-button').hide();
            $('.nomor-faktur').hide();
            $('.about-aplikasi').show(1200);
            $('.total-harga').hide();
        }
    })
    $('#back-button').hide();
    $('#back-mid-button').hide();
    $('#next-mid-button').hide();
    $('#save-button').hide();
    $('.total-harga').hide();
    $('.about-aplikasi').hide();


    $('.btn-wizard-laba').click(function () {
        var menu = $(this).attr('id');
        var element = document.getElementById("penerimaan");
        var element2 = document.getElementById("biaya_projek");
        var element3 = document.getElementById("biaya_tetap");
        var element4 = document.getElementById("biaya_administrasi");

        if (menu == "next-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element2.classList.add("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            $('#back-mid-button').show();
            $('#back-mid2-button').hide();
            $('#next-mid-button').show();
            $('#next-mid2-button').hide();
            $('#next-button').hide();
            $('#save-button').hide();
            $('#back-button').hide();
            $('.penerimaan').hide(1200);
            $('.biaya_projek').show(1200);
            $('.biaya_tetap').hide(1200);
            $('.biaya_administrasi').hide(1200);
        }

        if (menu == "back-mid-button") {
            element2.classList.remove("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element.classList.add("wizard-step-active");
            $('#back-button').hide();
            $('#next-button').show();
            $('#next-mid-button').hide();
            $('#next-mid2-button').hide();
            $('#back-mid-button').hide();
            $('#back-mid2-button').hide();
            $('#save-button').hide();
            $('.penerimaan').show(1200);
            $('.biaya_projek').hide(1200);
            $('.biaya_tetap').hide(1200);
            $('.biaya_administrasi').hide(1200);
        }

        if (menu == "next-mid-button") {
            element2.classList.remove("wizard-step-active");
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element3.classList.add("wizard-step-active");
            $('#back-button').show();
            $('#save-button').hide();
            $('#next-mid-button').hide();
            $('#next-mid2-button').show();
            $('#back-mid-button').hide();
            $('#back-mid2-button').hide();
            $('#next-button').hide();
            $('.penerimaan').hide(1200);
            $('.biaya_projek').hide(1200);
            $('.biaya_tetap').show(1200);
            $('.biaya_administrasi').hide(1200);
        }

        if (menu == "back-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            element2.classList.add("wizard-step-active");
            $('#back-mid-button').show();
            $('#back-mid2-button').hide();
            $('#next-mid-button').show();
            $('#next-mid2-button').hide();
            $('#save-button').hide();
            $('#next-button').hide();
            $('#back-button').hide();
            $('.penerimaan').hide(1200);
            $('.biaya_projek').show(1200);
            $('.biaya_tetap').hide(1200);
            $('.biaya_administrasi').hide(1200);
        }

        if (menu == "next-mid2-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.add("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            element2.classList.remove("wizard-step-active");
            $('#back-mid-button').hide();
            $('#back-mid2-button').show();
            $('#next-mid-button').hide();
            $('#next-mid2-button').hide();
            $('#save-button').show();
            $('#next-button').hide();
            $('#back-button').hide();
            $('.penerimaan').hide(1200);
            $('.biaya_projek').hide(1200);
            $('.biaya_tetap').hide(1200);
            $('.biaya_administrasi').show(1200);
        }

        if (menu == "back-mid2-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element3.classList.add("wizard-step-active");
            element2.classList.remove("wizard-step-active");
            $('#back-mid-button').hide();
            $('#back-mid2-button').hide();
            $('#next-mid-button').show();
            $('#next-mid2-button').hide();
            $('#save-button').hide();
            $('#next-button').hide();
            $('#back-button').show();
            $('.penerimaan').hide(1200);
            $('.biaya_projek').hide(1200);
            $('.biaya_tetap').show(1200);
            $('.biaya_administrasi').hide(1200);
        }
    })
    $('#back-button').hide();
    $('#back-mid-button').hide();
    $('#back-mid2-button').hide();
    $('#next-mid-button').hide();
    $('#next-mid2-button').hide();
    $('#save-button').hide();
    $('.biaya_projek').hide();
    $('.biaya_tetap').hide();
    $('.biaya_administrasi').hide();
    // -------------------------------------

    $('.btn-wizard-kas').click(function () {
        var menu = $(this).attr('id');
        var element = document.getElementById("penerimaan");
        var element2 = document.getElementById("pengeluaran");
        var element3 = document.getElementById("pengeluaran_lain");
        var element4 = document.getElementById("total_keseluruhan");

        if (menu == "next-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element2.classList.add("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            $('#back-mid-button').show();
            $('#back-mid2-button').hide();
            $('#next-mid-button').show();
            $('#next-mid2-button').hide();
            $('#next-button').hide();
            $('#save-button').hide();
            $('#back-button').hide();
            $('.penerimaan').hide(1200);
            $('.pengeluaran').show(1200);
            $('.pengeluaran_lainnya').hide(1200);
            $('.total_keseluruhan').hide(1200);
        }

        if (menu == "back-mid-button") {
            element2.classList.remove("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element.classList.add("wizard-step-active");
            $('#back-button').hide();
            $('#next-button').show();
            $('#next-mid-button').hide();
            $('#next-mid2-button').hide();
            $('#back-mid-button').hide();
            $('#back-mid2-button').hide();
            $('#save-button').hide();
            $('.penerimaan').show(1200);
            $('.pengeluaran').hide(1200);
            $('.pengeluaran_lainnya').hide(1200);
            $('.total_keseluruhan').hide(1200);
        }

        if (menu == "next-mid-button") {
            element2.classList.remove("wizard-step-active");
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element3.classList.add("wizard-step-active");
            $('#back-button').show();
            $('#save-button').hide();
            $('#next-mid-button').hide();
            $('#next-mid2-button').show();
            $('#back-mid-button').hide();
            $('#back-mid2-button').hide();
            $('#next-button').hide();
            $('.penerimaan').hide(1200);
            $('.pengeluaran').hide(1200);
            $('.pengeluaran_lainnya').show(1200);
            $('.total_keseluruhan').hide(1200);
        }

        if (menu == "back-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            element2.classList.add("wizard-step-active");
            $('#back-mid-button').show();
            $('#back-mid2-button').hide();
            $('#next-mid-button').show();
            $('#next-mid2-button').hide();
            $('#save-button').hide();
            $('#next-button').hide();
            $('#back-button').hide();
            $('.penerimaan').hide(1200);
            $('.pengeluaran').show(1200);
            $('.pengeluaran_lainnya').hide(1200);
            $('.total_keseluruhan').hide(1200);
        }

        if (menu == "next-mid2-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.add("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            element2.classList.remove("wizard-step-active");
            $('#back-mid-button').hide();
            $('#back-mid2-button').show();
            $('#next-mid-button').hide();
            $('#next-mid2-button').hide();
            $('#save-button').show();
            $('#next-button').hide();
            $('#back-button').hide();
            $('.penerimaan').hide(1200);
            $('.pengeluaran').hide(1200);
            $('.pengeluaran_lainnya').hide(1200);
            $('.total_keseluruhan').show(1200);
        }

        if (menu == "back-mid2-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element3.classList.add("wizard-step-active");
            element2.classList.remove("wizard-step-active");
            $('#back-mid-button').hide();
            $('#back-mid2-button').hide();
            $('#next-mid-button').show();
            $('#next-mid2-button').hide();
            $('#save-button').hide();
            $('#next-button').hide();
            $('#back-button').show();
            $('.penerimaan').hide(1200);
            $('.pengeluaran').show(1200);
            $('.pengeluaran_lainnya').hide(1200);
            $('.total_keseluruhan').hide(1200);
        }
    })
    $('#back-button').hide();
    $('#back-mid-button').hide();
    $('#back-mid2-button').hide();
    $('#next-mid-button').hide();
    // $('#next-button').show();
    $('#next-mid2-button').hide();
    $('#save-button').hide();
    $('.pengeluaran').hide();
    $('.pengeluaran_lainnya').hide();
    $('.total_keseluruhan').hide();
    // ---------------------------------------------------

    $('.btn-wizard-neraca').click(function () {
        var menu = $(this).attr('id');
        var element = document.getElementById("aktivalancar");
        var element2 = document.getElementById("aktivatetap");
        var element3 = document.getElementById("kewajibanlancar");
        var element4 = document.getElementById("kewajiban_jangkapanjang");

        if (menu == "next-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element2.classList.add("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            $('#back-mid-button').show();
            $('#back-mid2-button').hide();
            $('#next-mid-button').show();
            $('#next-mid2-button').hide();
            $('#next-button').hide();
            $('#save-button').hide();
            $('#back-button').hide();
            $('.aktivalancar').hide(1200);
            $('.aktivatetap').show(1200);
            $('.kewajibanlancar').hide(1200);
            $('.kewajiban_jangkapanjang').hide(1200);
        }

        if (menu == "back-mid-button") {
            element2.classList.remove("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element.classList.add("wizard-step-active");
            $('#back-button').hide();
            $('#next-button').show();
            $('#next-mid-button').hide();
            $('#next-mid2-button').hide();
            $('#back-mid-button').hide();
            $('#back-mid2-button').hide();
            $('#save-button').hide();
            $('.aktivalancar').show(1200);
            $('.aktivatetap').hide(1200);
            $('.kewajibanlancar').hide(1200);
            $('.kewajiban_jangkapanjang').hide(1200);
        }

        if (menu == "next-mid-button") {
            element2.classList.remove("wizard-step-active");
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element3.classList.add("wizard-step-active");
            $('#back-button').show();
            $('#save-button').hide();
            $('#next-mid-button').hide();
            $('#next-mid2-button').show();
            $('#back-mid-button').hide();
            $('#back-mid2-button').hide();
            $('#next-button').hide();
            $('.aktivalancar').hide(1200);
            $('.aktivatetap').hide(1200);
            $('.kewajibanlancar').show(1200);
            $('.kewajiban_jangkapanjang').hide(1200);
        }

        if (menu == "back-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            element2.classList.add("wizard-step-active");
            $('#back-mid-button').show();
            $('#back-mid2-button').hide();
            $('#next-mid-button').show();
            $('#next-mid2-button').hide();
            $('#save-button').hide();
            $('#next-button').hide();
            $('#back-button').hide();
            $('.aktivalancar').hide(1200);
            $('.aktivatetap').show(1200);
            $('.kewajibanlancar').hide(1200);
            $('.kewajiban_jangkapanjang').hide(1200);
        }

        if (menu == "next-mid2-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.add("wizard-step-active");
            element3.classList.remove("wizard-step-active");
            element2.classList.remove("wizard-step-active");
            $('#back-mid-button').hide();
            $('#back-mid2-button').show();
            $('#next-mid-button').hide();
            $('#next-mid2-button').hide();
            $('#save-button').show();
            $('#next-button').hide();
            $('#back-button').hide();
            $('.aktivalancar').hide(1200);
            $('.aktivatetap').hide(1200);
            $('.kewajibanlancar').hide(1200);
            $('.kewajiban_jangkapanjang').show(1200);
        }

        if (menu == "back-mid2-button") {
            element.classList.remove("wizard-step-active");
            element4.classList.remove("wizard-step-active");
            element3.classList.add("wizard-step-active");
            element2.classList.remove("wizard-step-active");
            $('#back-mid-button').hide();
            $('#back-mid2-button').hide();
            $('#next-mid-button').show();
            $('#next-mid2-button').hide();
            $('#save-button').hide();
            $('#next-button').hide();
            $('#back-button').show();
            $('.aktivalancar').hide(1200);
            $('.aktivatetap').hide(1200);
            $('.kewajibanlancar').show(1200);
            $('.kewajiban_jangkapanjang').hide(1200);
        }
    })
    $('#back-button').hide();
    $('#back-mid-button').hide();
    $('#back-mid2-button').hide();
    $('#next-mid-button').hide();
    $('#next-mid2-button').hide();
    $('#save-button').hide();
    $('.aktivatetap').hide();
    $('.kewajibanlancar').hide();
    $('.kewajiban_jangkapanjang').hide();
    
})
