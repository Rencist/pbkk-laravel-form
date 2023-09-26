console.log("JS IS WORKING !");
$("form").each(function (index) {
  $(this).attr("autocomplete", "off");
});

$("input:file").each(function (index) {
  // ! DANGER
  $(this).attr("accept", "image/*");
});

// $("td img").each(function (index) {
//   $(this).click(function () {
//     var td = $(this).parent();
//     td.find("div.popup-img").attr("style", "display: block");
//   });
// });

$(".se-pre-con").hide();
var isMobile = false; //initiate as false
// device detection
if (
  /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(
    navigator.userAgent
  ) ||
  /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
    navigator.userAgent.substr(0, 4)
  )
) {
  isMobile = true;
}

$(document).ready(function () {
  $("input[type=text]").attr("autocomplete", "off");

  $(".select2").select2({ width: "100%" });
});

$(document).ajaxStop(function () {
  setTimeout(function () {
    $(".se-pre-con").hide();
  }, 500);
});

$(document).ajaxStart(function () {
  $(".se-pre-con").show();
});

$(document).ajaxError(function () {
  setTimeout(function () {
    $(".se-pre-con").hide();
  }, 500);
});

$.fn.dataTable.ext.errMode = function (settings, helpPage, message) {
  setTimeout(function () {
    $(".se-pre-con").hide();
  }, 500);
};

function openCamera(url, img_target, input_link) {
  $("#img-target").val(img_target);
  $("#input-link").val(input_link);
  $.ajax({
    url: url,
    success: function (result) {
      $("#modal-camera").html(result);
      $("#modal-camera").modal();
    },
    error: function (result) {
      alert("Failed something went wrong");
    },
  });
}

$(document).ready(function () {
  $(".nav-menu-main").bind("click", function () {
    if ($(this).hasClass("is-active")) {
      $(".profile-perusahaan").hide();
    } else {
      $(".profile-perusahaan").show();
    }
  });
});

personnelsUsed = [];
personnelsUnused = [];

$(document).ready(function () {
  $(".check-personil").on("input", function () {
    var sum = 0;
    $(".check-personil").each(function () {
      personnelId = parseInt($(this).val());
      usedIndex = personnelsUsed.indexOf(personnelId);
      unusedIndex = personnelsUnused.indexOf(personnelId);
      if (this.checked) {
        if (usedIndex < 0) {
          personnelsUsed.push(personnelId);
        }

        if (unusedIndex > -1) {
          personnelsUnused.splice(unusedIndex, 1);
        }
        // console.log(personnelsUsed);
      } else {
        if (usedIndex > -1) {
          personnelsUsed.splice(usedIndex, 1);
        }

        if (unusedIndex < 0) {
          personnelsUnused.push(personnelId);
        }
        // console.log(personnelsUsed);
      }
    });
  });
});

$("#save-personil-form").submit(function (eventObj) {
  $("<input />")
    .attr("type", "hidden")
    .attr("name", "used_personnel_ids")
    .attr("value", JSON.stringify(personnelsUsed))
    .appendTo("#save-personil-form");

  $("<input />")
    .attr("type", "hidden")
    .attr("name", "unused_personnel_ids")
    .attr("value", JSON.stringify(personnelsUnused))
    .appendTo("#save-personil-form");

  return true;
});

personnelRequests = [];

$(document).ready(function () {
  $(".check-personil-global").on("input", function () {
    $(".check-personil-global").each(function () {
      personnelId = parseInt($(this).val());
      index = personnelRequests.indexOf(personnelId);
      if (this.checked) {
        if (index < 0) {
          personnelRequests.push(personnelId);
        }
      } else if (index > -1) {
        personnelRequests.splice(index, 1);
      }
    });
  });
});

$("#request-personil-form").submit(function (eventObj) {
  $("<input />")
    .attr("type", "hidden")
    .attr("name", "request_personnel_ids")
    .attr("value", JSON.stringify(personnelRequests))
    .appendTo("#request-personil-form");

  return true;
});

transUsed = [];
transUnused = [];

$(document).ready(function () {
  $(".check-kendaraan").on("input", function () {
    var sum = 0;
    $(".check-kendaraan").each(function () {
      transId = parseInt($(this).val());
      usedIndex = transUsed.indexOf(transId);
      unusedIndex = transUnused.indexOf(transId);
      if (this.checked) {
        if (usedIndex < 0) {
          transUsed.push(transId);
        }

        if (unusedIndex > -1) {
          transUnused.splice(unusedIndex, 1);
        }
        // console.log(transUsed);
      } else {
        if (usedIndex > -1) {
          transUsed.splice(usedIndex, 1);
        }

        if (unusedIndex < 0) {
          transUnused.push(transId);
        }
        // console.log(transUsed);
      }
    });
  });
});

$("#save-kendaraan-form").submit(function (eventObj) {
  $("<input />")
    .attr("type", "hidden")
    .attr("name", "used_transportation_ids")
    .attr("value", JSON.stringify(transUsed))
    .appendTo("#save-kendaraan-form");

  $("<input />")
    .attr("type", "hidden")
    .attr("name", "unused_transportation_ids")
    .attr("value", JSON.stringify(transUnused))
    .appendTo("#save-kendaraan-form");

  return true;
});

// Tambahan Altertech
