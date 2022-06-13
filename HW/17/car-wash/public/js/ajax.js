function off(id) {
    $(document).ready(function () {
        $("#".id).delay(2000).fadeOut();
    });
}

$(document).ready(function () {
    $("#send").click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "booking",
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
                        $("#massage").text(response.message);
                        $("#error").show();
                        off("error");
                    }
                    if (response.status == "success") {
                        $("#title").text(response.status);
                        $("#massage").text(response.message);
                        $("#success").show();
                        off("success");
                    }
                    // $(".success").text(response.success);
                    // $("#ajaxform")[0].reset();
                }
            },
            dataType: "json",
        });
    });
});
