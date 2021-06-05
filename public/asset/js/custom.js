$(document).ready(function () {
    $(".snackbar").fadeIn();
    $(".snackbar").fadeOut(7000).delay(7000);
});
$(document).ready(function () {
    $(".snackbar-top").fadeIn();
    $(".snackbar-top").fadeOut(7000).delay(7000);
});

// next date close


// $(document).ready(function () {
//     var tes;
//    $('#angsur').change(function () {
//     var value =  $(this).children("option:selected").val(); 
//     var rt = $('#tes-inp').val();
//     var xc= value+rt;
//     $('#plx').val(xc); 
//    });
// });

$(document).ready(function () {
    // cek format
    function addCommas(nStr)
    {   
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    // end format

    
  //   $('#nominal' ).keyup(function() {
  //       var nominal = $( this ).val();
  //       var angsur =$('#angsur').children("option:selected").val(); 
  //       // var hs = Number(nominal)+Number(angsur);
  //       // $('#skenario').text("Rp."+addCommas(hs));
  //       if(nominal.length > 0){ 

  //           $.ajax({
  //           headers: {
  //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //               },
  //             type:"post",
  //             url:"/anggota/cek-angsur",
  //             data:{nominal:nominal,angsur:angsur},
  //             success: function(data){          
  //               $('#skenario').html(data);
  //             }
  //           });
  //         }
    
  // }).keyup();

});




  
$(document).ready(function () {

  $("#format_rupiah").on('keyup', function(){
   
    var x =$(this).val();
    var n = parseInt($(this).val().replace(/\D/g,''),10);
    if(x != ""){
      // $(this).val(n.toLocaleString());
      $(".show_rupiah").html("Rp.&nbsp;"+n.toLocaleString());
     
    }else{
      $(this).val();
    }
   
  });

  $("#format_rupiah_2").on('keyup', function(){
   
    var x =$(this).val();
    var n = parseInt($(this).val().replace(/\D/g,''),10);
    if(x != ""){
      // $(this).val(n.toLocaleString());
      $(".show_rupiah_2").html("Rp.&nbsp;"+n.toLocaleString());
     
    }else{
      $(this).val();
    }
   
  });

  
  $("#format_rupiah_3").on('keyup', function(){
   
    var x =$(this).val();
    var n = parseInt($(this).val().replace(/\D/g,''),10);
    if(x != ""){
      // $(this).val(n.toLocaleString());
      $(".show_rupiah_3").html("Rp.&nbsp;"+n.toLocaleString());
     
    }else{
      $(this).val();
    }
   
  });
 
});


$(document).ready(function () {
  
  $("#data1").DataTable({
    "columnDefs": [
      { "orderable": false, "targets": 0 }
    ],

   
  });
  $("#data2").DataTable({
    "columnDefs": [
      { "orderable": false, "targets": 0 }
    ],
 

  });
  $("#data3").DataTable({
    "columnDefs": [
      { "orderable": false, "targets": 0 }
    ],
 

  });
  $("#data4").DataTable({
    "columnDefs": [
      { "orderable": false, "targets": 0 }
    ],
 

  });
  $("#data5").DataTable({
    "columnDefs": [
      { "orderable": false, "targets": 0 }
    ],
 

  });
});

// year picker
// $(function(){
//   $('#datepickers').datepicker({
//       changeMonth: false,
//       changeYear: true,
//       showButtonPanel: true,
//       yearRange: '1950:2013', // Optional Year Range
//       dateFormat: 'yy',
//       onClose: function(dateText, inst) { 
//           var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
//           $(this).datepicker('setDate', new Date(year, 0, 1));
//       }});
//   });

$("#datepicker").datepicker({
  format: "yyyy",
  viewMode: "years", 
  minViewMode: "years"
});

 //Initialize Select2 Elements
 $('.select2').select2();

 //Initialize Select2 Elements
 $('.select2bs4').select2({
   theme: 'bootstrap4'
 });

 $(function () {
  bsCustomFileInput.init();
});