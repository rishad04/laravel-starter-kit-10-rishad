// ONLICK BROUSE FILE UPLOADER
var fileInp = document.getElementById("fileBrouse");
var fileInp2 = document.getElementById("fileBrouse2");
var fileInp3 = document.getElementById("fileBrouse3");
var fileInp4 = document.getElementById("fileBrouse4");

if (fileInp) {
  fileInp.addEventListener("change", showFileName);

  function showFileName(event) {
    var fileInp = event.srcElement;
    var fileName = fileInp.files[0].name;
    document.getElementById("placeholder").placeholder = fileName;
  }
}

if (fileInp2) {
  fileInp2.addEventListener("change", showFileName);

  function showFileName(event) {
    var fileInp = event.srcElement;
    var fileName = fileInp.files[0].name;
    document.getElementById("placeholder2").placeholder = fileName;
  }
}
if (fileInp3) {
  fileInp3.addEventListener("change", showFileName);

  function showFileName(event) {
    var fileInp = event.srcElement;
    var fileName = fileInp.files[0].name;
    document.getElementById("placeholder3").placeholder = fileName;
  }
}
if (fileInp4) {
  fileInp4.addEventListener("change", showFileName);

  function showFileName(event) {
    var fileInp = event.srcElement;
    var fileName = fileInp.files[0].name;
    document.getElementById("placeholder4").placeholder = fileName;
  }
}


$(document).ready(function () {

$('.change-module').on('change', function (e) {
    e.preventDefault();
    var code = $('#code').val();
    var module = $(this).val();


    var formData = {
        code: code,
        module: module,
    }
    $.ajax({
        type: "GET",
        dataType: 'html',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/admin/language/change-module',
        success: function (data) {
            console.log(data);
            $('#language-terms tbody').html(data);
        },
        error: function (data) {
        }
    });
});

});

