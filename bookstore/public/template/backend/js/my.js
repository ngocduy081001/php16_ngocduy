$(document).ready(function () {
  $("#filter_group_acp").change(function (e) {
    $("#filter_group_acp").submit();
  });
  $("#btn-search-clear").click(function () {
    $("#search_values").val("");
  });
  $("#bulk-apply").click(function () {
    var action = $("#bulk-action").val();
    if (isNaN(action)) {
      var conutValues = 0;
      $("input[name=checkbox-item]").each(function () {
        if (this.checked == true) {
          conutValues++;
          console.log(this.id);
        }
      });
      if (conutValues == 0) {
        alert("Hãy chọn ít nhất 1 bộ dữ liệu");
      }
    } else {
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

  $("#btn-search").click(function (e) {
    var search = $("#search_values").val();
    var regex = new RegExp("^[a-zA-Z]");
    if (regex.test(search) == false) {
      e.preventDefault();
    }
  });
});
