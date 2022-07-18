$(document).ready(function () {
  $(".data-dealer").load("config/data_dealer.php");
  $(".tambah").click(function () {
    tambahdata();
  });

  // fungsi click enter
  $("input").on("keypress", function (e) {
    if (e.which == 13) {
      switch ($(this).attr("id")) {
        case "nama-dealer":
          $(".tambah").click();
          e.preventDefault();
          break;
      }
    }
  });
});

function tambahdata() {
  var data = $("#form-dealer").serialize();
  var dealer = $(".nama-dealer").val();

  if (dealer == "") {
    $("#err-dealer").html("Wajib diisi..!");
    setTimeout(function () {
      $("#err-dealer").html("");
    }, 1000);
  } else {
    $("#err-dealer").html("");

    $.ajax({
      type: "POST",
      url: "config/simpan_dealer.php",
      data: data,
      success: function () {
        $(".data-dealer").load("config/data_dealer.php");
        document.getElementById("form-dealer").reset();
      },
    });
  }
}
