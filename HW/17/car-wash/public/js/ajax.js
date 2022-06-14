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
                    }
                }
            },
            dataType: "json",
        });
    });
});

$(document).ready(function () {
    $("#send_edit").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "/booking/edit",
            type: "GET",
            data: {
                edit: $("#edit").val(),
            },
            success: function (response) {
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
                    }
                    if (response.action == "reloaded") {
                        window.setTimeout(function () {
                            window.location.replace("/");
                        }, 1100);
                    }
                }
            },
            dataType: "json",
        });
    });
});

$(document).ready(function () {
    $("#send_update").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "/booking/update",
            type: "PUT",
            data: {
                update: $("#delete").val(),
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
                    }
                    if (response.action == "reloaded") {
                        window.setTimeout(function () {
                            window.location.replace("/");
                        }, 1100);
                    }
                }
            },
            dataType: "json",
        });
    });
});
