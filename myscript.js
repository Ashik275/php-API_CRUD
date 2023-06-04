$(document).ready(function () {
  loadData();
});
function loadData() {
  $.ajax({
    url: "http://localhost/php_restAPI/api-fetch-all.php",
    type: "GET",
    success: function (data) {
      if (data.status == false) {
        alert("No Data Found");
      } else {
        $.each(data, function (key, value) {
          $("#load-table").append(`
                  <tr>
                  <td scope="row">${value.id}</td>
                  <td>${value.name}</td>
                  <td>${value.email}</td>
                  <td>
                  <button type="button" class="btn btn-success btn-sm" onclick="edit(${value.id})" data-eid=${value.id}}>Edit</button>
                  </td>
                  <td>
                  <button type="button" class="btn btn-danger btn-sm" onclick='delete_data(${value.id})'>Delete</button>
                  </td>
                 </tr>
               `);
        });
      }
    },
  });
}
function edit(id) {
  $("#exampleModal").modal("show");
  var stu_id = id;
  var obj = { sid: stu_id };
  var myJSON = JSON.stringify(obj);
  $.ajax({
    url: "http://localhost/php_restAPI/api-fetch-single.php",
    type: "POST",
    data: myJSON,
    success: function (data) {
      let info = data[0];
      $("#sname").val(info.name);
      $("#semail").val(info.email);
      $("#sid").val(info.id);
    },
  });
}
function delete_data(id) {
  var stu_id = id;
  var obj = { sid: stu_id };
  var myJSON = JSON.stringify(obj);
  let cnfrm = confirm("Are you sure you want to delete this record??");
  if (cnfrm == true) {
    $.ajax({
      url: "http://localhost/php_restAPI/api-delete.php",
      type: "POST",
      data: myJSON,
      success: function (data) {
        if (data.status == true) {
          $(".msg")
            .css("display", "block")
            .html(`<p style='color:red';font-weight:bold>${data.message}<p/>`);
          $("#OppexampleData").load(" #OppexampleData > *");
          loadData();
          setTimeout(function () {
            $(".msg").css("display", "none");
          }, 5000);
        }
      },
    });
  }
}
function insert() {
  let name = $("#name").val();
  let email = $("#email").val();
  var obj = { sname: name, semail: email };
  var myJSON = JSON.stringify(obj);
  $.ajax({
    url: "http://localhost/php_restAPI/api-insert.php",
    type: "POST",
    data: myJSON,
    success: function (data) {
      if (data.status == true) {
        name.val='';
        email.val='';
        $(".msg")
          .css("display", "block")
          .html(`<p style='color:red';font-weight:bold>${data.message}<p/>`);
        $("#OppexampleData").load(" #OppexampleData > *");
        loadData();
        setTimeout(function () {
          $(".msg").css("display", "none");
        }, 5000);
      } else {
        $(".msg")
          .css("display", "block")
          .html(`<p style='color:red';font-weight:bold>${data.message}<p/>`);
        setTimeout(function () {
          $(".msg").css("display", "none");
        }, 5000);
      }
    },
  });
}
function update() {
  let name = $("#sname").val();
  let email = $("#semail").val();
  let id = $("#sid").val();
  var obj = { sname: name, semail: email, sid: id };
  var myJSON = JSON.stringify(obj);
  console.log(myJSON);
  $.ajax({
    url: "http://localhost/php_restAPI/update-api.php",
    type: "POST",
    data: myJSON,
    success: function (data) {
      if (data.status == true) {
        $("#exampleModal").modal("hide");
        $(".msg")
          .css("display", "block")
          .html(`<p style='color:red';font-weight:bold>${data.message}<p/>`);
        $("#OppexampleData").load(" #OppexampleData > *");
        loadData();
        setTimeout(function () {
          $(".msg").css("display", "none");
        }, 5000);
      } else {
        $(".msg")
          .css("display", "block")
          .html(`<p style='color:red';font-weight:bold>${data.message}<p/>`);
        setTimeout(function () {
          $(".msg").css("display", "none");
        }, 5000);
      }
    },
  });
}
function search() {
  let search_key = $("#search").val();
  $("#load-table").html("");
  var obj = { search: search_key };
  var myJSON = JSON.stringify(obj);
  $.ajax({
    url: "http://localhost/php_restAPI/api-search.php",
    type: "POST",
    data: myJSON,
    success: function (data) {
      if (data.status == false) {
        alert("No Data Found");
      } else {
        $.each(data, function (key, value) {
          $("#load-table").append(`
                  <tr>
                  <td scope="row">${value.id}</td>
                  <td>${value.name}</td>
                  <td>${value.email}</td>
                  <td>
                  <button type="button" class="btn btn-success btn-sm" onclick="edit(${value.id})" data-eid=${value.id}}>Edit</button>
                  </td>
                  <td>
                  <button type="button" class="btn btn-danger btn-sm" onclick='delete_data(${value.id})'>Delete</button>
                  </td>
                 </tr>
               `);
        });
      }
    },
  });
}