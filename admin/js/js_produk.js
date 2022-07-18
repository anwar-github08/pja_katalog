$(document).ready(function () {
  $(".data-kemasan").load("config/data_kemasan.php");
  $(".tambah").click(function () {
    tambahdata();
  });

  $(".batal").click(function () {
    batal();
  });
});

$("input").on("keypress", function (e) {
  if (e.which == 13) {
    switch ($(this).attr("id")) {
      case "volume":
        $(".isi").focus();
        e.preventDefault();
        break;
      case "isi":
        $(".tambah").click();
        e.preventDefault();
        break;
    }
  }
});

function tambahdata() {
  var data = $("#form-kemasan").serialize();
  var volume = $(".volume").val();
  var isi = $(".isi").val();

  if (volume == "") {
    $(".err-volume").html("wajib diisi..!!");
    setTimeout(function () {
      $(".err-volume").html("");
    }, 1000);
  } else {
    $(".err-volume").html("");
  }

  if (isi == "") {
    $(".err-isi").html("wajib diisi..!!");
    setTimeout(function () {
      $(".err-isi").html("");
    }, 1000);
  } else {
    $(".err-isi").html("");
  }

  if (volume !== "" && isi !== "") {
    $.ajax({
      type: "POST",
      url: "config/simpan_tmp_kemasan.php",
      data: data,
      success: function () {
        $(".data-kemasan").load("config/data_kemasan.php");
        $("#form-kemasan").trigger("reset");
        $("#volume").focus();
      },
    });
  }
}

function batal() {
  if (confirm("batal..?") == true) {
    $.ajax({
      type: "POST",
      url: "config/batal.php",
      success: function () {
        location = "a_tampil_produk.php";
      },
    });
  }
}

// select2
$("select").select2();

function hanyaAngka(evt) {
  var kode = evt.which ? evt.which : event.keyCode;
  if (kode > 31 && (kode < 48 || kode > 57)) return false;
  return true;
}
