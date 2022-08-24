$(document).ready(function () {
  $("#filter_group_acp").change(function (e) {
    $("#filter_group_acp").submit();
  });
  $("#btn-search-clear").click(function () {
    $("#search_values").val("");
  });
  $("#bulk-apply").click(function () {
    let url = $(this).data("url");
    let slbValue = $("#bulk-action").val();
    if (slbValue != "default") {
      ckbLength = $('input[name="ckid[]"]:checked').length;
      if (ckbLength > 0) {
        url = url.replace("value_new", slbValue);
        $("#form-table").attr("action", url);
        $("#form-table").submit();
      } else {
        alert("Vui long chon it nhat 1 checkbox");
      }
    } else {
      alert("Vui long chon action");
    }
  });
  // Check all, Uncheck all
  $("#check-all").change(function () {
    $("input:checkbox").prop("checked", $(this).prop("checked"));
  });

  $("#btn-search").click(function (e) {
    var search = $("#search_values").val();
    var regex = new RegExp("^[a-zA-Z]");
    if (regex.test(search) == false) {
      e.preventDefault();
    }
  });
  $("select[name='select-group']").change(function () {
    var group = $(this).val();
    var id = $(this).data("id");
    $.ajax({
      type: "POST",
      url: "index.php?module=backend&controller=user&action=changeGroup",
      data: { group: group, id: id, message: "message" },
      success: function (data) {
        //sessionStorage.setItem("message", "message");
      },
    });
  });
});
