function showTime() {
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";

    if (h == 0) {
        h = 12;
    }

    if (h > 12) {
        h = h - 12;
        session = "PM";
    }

    h = h < 10 ? "0" + h : h;
    m = m < 10 ? "0" + m : m;
    s = s < 10 ? "0" + s : s;

    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;

    setTimeout(showTime, 1000);
}
showTime();

//                 email: $("input[name='email']").val(),
//                 date: $("input[name='date']").val(),
//                 time: $("input[name='time']").val(),
//                 service: $("select[name='service']").val(),
//                 fastService: $("select[name='fastService']").val(),
//             },
//             success: function (response) {
//                 console.log(response);
//                 if (response) {
//                     if (response.status == "error") {
//                         $("#title").text(response.status);
//                         $("#body_massage").text(response.body);
//                         $("#error").show();
//                         off("#error");
//                         return;
//                     }
//                     if (response.status == "success") {
//                         $("#title").text(response.status);
//                         $("#body_massage").text(response.body);
//                         $("#success").show();
//                         off("#success");
//                     }
//                 }
//             },
//             error: function (textStatus, errorThrown) {
//                 $.notify("Hello World");
//                 // alert(response);
//                 //console.log(textStatus.responseJSON.errors);
//                 let errorsd = textStatus.responseJSON.errors;
//                 let errors = Object.values(errorsd);
//                 errors.forEach(myFunction);
//             },
//             dataType: "json",
//         });
//     });
// });
// function myFunction(currentValue, index) {
//     console.log(
//         "Array Current Index is: " + index + " :: Value is: " + currentValue
//     );
// }
