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
    } else {
      var conutValues = 0;
      $("input[type=checkbox]").each(function () {
        if (this.checked != true) {
          conutValues++;
        }
      });
      console.log(conutValues);
      if (conutValues != 0) {
        alert("Hãy chọn ít nhất 1 giá trị");
      }
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

  $("#btn-search").click(function (e) {
    var search = $("#search_values").val();
    var regex = new RegExp("^[a-zA-Z]");
    if (regex.test(search) == false
    ) {
      e.preventDefault();
    }
  });
});
