<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
{{-- <script src="{{ asset('modules/jquery.mask.min.js') }}"></script>
<script src="{{ asset('modules/jquery-ui/jquery-ui.min.js') }} "></script>
<script src="{{ asset('modules/tooltip.js') }}"></script>
<script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script> --}}

<!-- JS Libraies -->
{{-- <script src="{{ asset('modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('modules/chart.js/dist/Chart.min.js') }}"></script> --}}
{{-- <script src="{{ asset('modules/owl.carousel/dist/owl.carousel.min.js') }}"></script> --}}
{{-- <script src="{{ asset('modules/summernote/dist/summernote-bs4.js') }}"></script> --}}
{{-- <script src="{{ asset('modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script> --}}

{{-- Datatables --}}
<script src="{{ asset('modules/datatables/datatables.min.js') }} "></script>
<script src="{{ asset('modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }} "></script>
<script src="{{ asset('modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }} "></script>
<script src="{{ asset('modules/jquery-ui/jquery-ui.min.js') }} "></script>
<script src="{{ asset('assets/js/page/modules-datatables.js') }} "></script>

<script src="{{ asset('modules/chocolat/dist/js/jquery.chocolat.min.js') }} "></script>
<script src="{{ asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }} "></script>
{{-- upload file --}}
<script src="{{ asset('modules/summernote/summernote-bs4.js') }} "></script>

<script src="{{ asset('modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }} "></script>
{{-- <script src="{{ asset('js/page/features-post-create.js') }} "></script> --}}

<script src="{{ asset('modules/prism/prism.js') }} "></script>
{{-- <script src="{{ asset('js/page/bootstrap-modal.js') }} "></script> --}}
{{-- <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script> --}}

<!-- Template JS File -->
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/footer.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<script>
  var delay = 1500;
  $(document).ready(function(){
    setTimeout(function(){
    $(".preloader").fadeOut();
    },delay)
  })
</script>

<script>
  $(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
  $('#create-artikels').click(function () {
        $('#saveBtn').val("create-product");
        $('#saveBtn').html("Create Artikel");
        $('#id').val('');
        $('#formartikels').trigger("reset");
        $('#exampleModalCenterTitle').html("Tambah Artikel");
        $('#exampleModalCenter').modal('show');
    });

    $('body').on('click', '#modal-edit', function () {
        $('#formartikels').trigger("reset");
        var id = $(this).data('id');
        console.log(id);
        $.get("{{ url('artikels_edit') }}" + '/' + id, function (data) {
            $('#exampleModalCenterTitle').html("Edit Artikel");
            $('#saveBtn').val("edit-artikel");
            $('#saveBtn').html("Edit Data");
            $('#exampleModalCenter').modal('show');
            $('#id').val(data.id);
            $('#judul_artikel').val(data.judul_artikel);
            // $('#slug').val(data.slug);
            $('#konten').val(data.konten);
            $('#upload_gambar').val(data.upload_gambar);
        })
        // console.log(data.upload_gambar);
    });

    $('#saveBtn').click(function (e) {
    e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: new FormData($("#formartikels")[0]),
            url: "{{url('artikelscreate')}} ",
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (data) {

              $('#formartikels').trigger("reset");
              $('#saveBtn').html('Simpan Data');
              $('#exampleModalCenter').modal('hide');
              $( "#table-1" ).load( "{{url('artikels')}} #table-1" );
              swal("Success!", "Success Update Data!", "success");
              location.reload();
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
        });
    });

    $('body').on('click', '#deleteartikel', function () {
     var id = $(this).data("id"); 
      swal({
       title: "Data Akan Dihapus?",
       text: "Anda tidak bisa memulihkannya lagi setelah data dihapus",
       icon: "warning",
       buttons: [
         'Batal',
         'Hapus Data'
       ],
       dangerMode: true,
     }).then(function(isConfirm) {
       if (isConfirm) {
          $.ajax({
               type: "DELETE",
               url: "{{ url('artikels_hapus') }}"+'/'+id,
               success: function (data) {
              //  $("#id_" + id).remove();
               
               },
               error: function (data) {
                   console.log('Error:', data);
               }
           });
         
         swal({
           title: 'Berhasil Dihapus!',
           text: 'Data Artikel Berhasil Dihapus',
           icon: 'success'
         });
        location.reload();
        //  table.draw();
        //  window.location = window.location;
       } else {
         swal("Gagal Dihapus", "Data Artikel Masih Tersimpan", "error");
       }
     });
    });

    $('#create-user').click(function () {
        $('#saveUser').val("create-product");
        $('#saveUser').html("Create User");
        $('#id').val('');
        $('#formuser').trigger("reset");
        $('#exampleModalCenterTitle').html("Tambah User");
        $('#exampleModalCenter').modal('show');
    });

    // $('body').on('click', '.modal-edit-user', function () {
    //     $('#formuser').trigger("reset");
    //     var id = $(this).data('id');
    //     console.log(id);
    //     $.get("{{ url('users_edit') }}" + '/' + id, function (data) {
    //         $('#exampleModalCenterTitle').html("Edit User");
    //         $('#saveUser').val("edit-user");
    //         $('#saveUser').html("Edit Data");
    //         $('#exampleModalCenter').modal('show');
    //         $('#id').val(data.id);
    //         $('#name').val(data.name);
    //         $('#email').val(data.email);
    //         $('#no_hp').val(data.no_hp);
    //         $('#alamat').val(data.alamat);
    //         $('#level').hide();
    //         $('#password').hide();
    //         $('#password-confirm').hide();
    //     })
    // });

    $('#saveUser').click(function (e) {
    e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: new FormData($("#formuser")[0]),
            url: "{{url('usercreate')}} ",
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (data) {

              $('#formuser').trigger("reset");
              $('#saveUser').html('Simpan Data');
              $('#exampleModalCenter').modal('hide');
              // location.reload();
              $( "#table-1" ).load( "{{url('users')}} #table-1" );
              swal("Success!", "Success Update Data!", "success");
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveUser').html('Save Changes');
          }
        });
    });

    $('body').on('click', '#delete_pesanan_air', function () {
     var id = $(this).data("id"); 
      swal({
       title: "Data Akan Dihapus?",
       text: "Anda tidak bisa memulihkannya lagi setelah data dihapus",
       icon: "warning",
       buttons: [
         'Batal',
         'Hapus Data'
       ],
       dangerMode: true,
     }).then(function(isConfirm) {
       if (isConfirm) {
          $.ajax({
               type: "DELETE",
               url: "{{ url('delete_pesanan_air') }}"+'/'+id,
               success: function (data) {
              //  $("#id_" + id).remove();
               
               },
               error: function (data) {
                   console.log('Error:', data);
               }
           });
         
         swal({
           title: 'Berhasil Dihapus!',
           text: 'Data Pesanan Air Berhasil Dihapus',
           icon: 'success'
         });
        location.reload();
        //  table.draw();
        //  window.location = window.location;
       } else {
         swal("Gagal Dihapus", "Data Pesanan Air Masih Tersimpan", "error");
       }
     });
    });

    $('body').on('click', '#delete_user', function () {
     var id = $(this).data("id"); 
      swal({
       title: "Data Akan Dihapus?",
       text: "Anda tidak bisa memulihkannya lagi setelah data dihapus",
       icon: "warning",
       buttons: [
         'Batal',
         'Hapus Data'
       ],
       dangerMode: true,
     }).then(function(isConfirm) {
       if (isConfirm) {
          $.ajax({
               type: "DELETE",
               url: "{{ url('delete_user') }}"+'/'+id,
               success: function (data) {
              //  $("#id_" + id).remove();
               
               },
               error: function (data) {
                   console.log('Error:', data);
               }
           });
         
         swal({
           title: 'Berhasil Dihapus!',
           text: 'Data User Berhasil Dihapus',
           icon: 'success'
         });
        location.reload();
        //  table.draw();
        //  window.location = window.location;
       } else {
         swal("Gagal Dihapus", "Data User Masih Tersimpan", "error");
       }
     });
    });

  });

  $('#customFile').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#customFile')[0].files[0].name;
  $(this).prev('label').text(file);
});
</script>