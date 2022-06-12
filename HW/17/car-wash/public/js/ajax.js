function off() {
    $(document).ready(function () {
        $("#error").delay(1000).fadeOut();
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
                        off();
                    }
                    // $(".success").text(response.success);
                    // $("#ajaxform")[0].reset();
                }
            },
            dataType: "json",
        });
    });
});
