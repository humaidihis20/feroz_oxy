 // edit surat

   $('body').on('click', '#editSurat', function () {
     var id = $(this).data('id');
    //  var jenis = $("#modal-edit").attr("class");
     console.log(id);
          $.get('suratedit/'+id+'/edit', function (data) {
          $('#exampleModalLabel').html("Edit Surat");
          $('#save-btn').html("Edit Data");
          $('#save-btn').val("edit-surat");
          $('#ajaxModel').modal('show');
          $('#admin_id').val(data.admin_id);
          $('#tanggal_surat').val(data.tanggal_surat);
          $('#nomor_surat').val(data.nomor_surat);
          // $('#jenis_surat').val(data.jenis_surat);
          $('#asal_surat').val(data.asal_surat);
          $('#perihal').val(data.perihal);
          // alert(tanggal_surat);
       }); 
  });
  
  // $('#save-btn').on('submit', function (){
    
  //   $.ajax({
  //     data: new FormData($("#editForm")[0]),
  //     url: "{{url('suratmasuk', 'suratkeluar)}} ",
  //     type: "POST",
  //     contentType: false,
  //     cache: false,
  //     processData: false,
  //     dataType: 'json',
  //     success: function (data) {
  
  //         $('#editForm').trigger("reset");
  //         $('#save-btn').html('Simpan Data');
  //         $('#ajaxModel').modal('hide');
  //         // table.draw();
  //         $( "#table-1" ).load( "{{url('surat')}} #table-1" );
  //         swal("Success!", "Success Update Data!", "success");
  //     },
  //     error: function (data) {
  //         console.log('Error:', data);
  //         $('#save-btn').html('Save Changes');
  //     }
  //   });
  // });
 
