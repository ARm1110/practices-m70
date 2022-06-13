function off(id) {
    $(document).ready(function () {
        $(id).delay(1000).fadeOut();
    });
}

$(document).ready(function () {
    $("#send").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "/booking",
            type: "POST",
            data: {
                _token: $("input[name='_token']").val(),
                email: $("input[name='email']").val(),
                date: $("input[name='date']").val(),
                time: $("input[name='time']").val(),
                service: $("select[name='service']").val(),
                fastService: $("select[name='fastService']").val(),
            },
            success: function (response) {
                console.log(response);
                if (response) {
                    if (response.status == "error") {
                        $("#title").text(response.status);
                        $("#body_massage").text(response.body);
                        $("#error").show();
                        off("#error");
                        return;
                    }
                    if (response.status == "success") {
                        $("#title").text(response.status);
                        $("#body_massage").text(response.body);
                        $("#success").show();
                        off("#success");
                        return;
                    }
                }
            },
            dataType: "json",
        });
    });
});

$(document).ready(function () {
    $("#send_token").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "/booking/show",
            type: "GET",
            data: {
                token: $("input[name='token']").val(),
            },
            success: function (response) {
                console.log(response);
                if (response) {
                    if (response.status == "error") {
                        $("#title").text(response.status);
                        $("#body_massage").text(response.body);
                        $("#error").show();
                        off("#error");
                        return;
                    }
                    if (response.status == "success") {
                        $("#title").text(response.status);
                        $("#body_massage").text(response.body);
                        $("#success").show();
                        off("#success");
                        return;
                    }
                    // window.location.replace(response);
                    // $(".success").text(response.success);
                    // $("#ajaxform")[0].reset();
                }
            },
            dataType: "json",
        });
    });
});
