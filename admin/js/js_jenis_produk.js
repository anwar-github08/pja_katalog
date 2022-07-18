$(document).ready(function () {
  $(".data-jenis-produk").load("config/data_jenis_produk.php");
  $(".tambah").click(function () {
    tambahdata();
  });

  // fungsi click enter
  $("input").on("keypress", function (e) {
    if (e.which == 13) {
      switch ($(this).attr("id")) {
        case "jenis-produk":
          $(".tambah").click();
          e.preventDefault();
          break;
      }
    }
  });
});

function tambahdata() {
  var data = $("#form-jenis-produk").serialize();
  var jenis_produk = $(".jenis-produk").val();

  if (jenis_produk == "") {
    $("#err-jenis-produk").html("Wajib diisi..!");
    setTimeout(function () {
      $("#err-jenis-produk").html("");
    }, 1000);
  } else {
    $("#err-jenis-produk").html("");

    $.ajax({
      type: "POST",
      url: "config/simpan_jenis_produk.php",
      data: data,
      success: function () {
        $(".data-jenis-produk").load("config/data_jenis_produk.php");
        document.getElementById("form-jenis-produk").reset();
      },
    });
  }
}
