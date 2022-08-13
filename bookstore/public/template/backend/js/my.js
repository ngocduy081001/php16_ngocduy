$(document).ready(function () {
  $("#filter_group_acp").change(function (e) {
    $("#filter_group_acp").submit();
  });
  $("#btn-search-clear").click(function () {
    $("#search_values").val("");
  });
  $("#bulk-apply").click(function () {
    var action = $("#bulk-action").val();
    if (!isNaN(action)) {
      alert("Hãy chọn chức năng");
    }
  });
  $("#check-all").on("click", function () {
    if (this.checked) {
      $("input[type=checkbox]").each(function () {
        this.checked = true;
      });
    } else {
      $("input[type=checkbox]").each(function () {
        this.checked = false;
      });
    }
  });
});
