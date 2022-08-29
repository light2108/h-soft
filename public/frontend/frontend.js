

$(".img-circle").click(function () {
    $(".file-circle").click();
});
var loadfile = function (event) {
    var output = document.getElementById("output");
    output.src = URL.createObjectURL(event.target.files[0]);
};

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(".confirm_phone").click(function () {
        var phone = $(".phone").val();
        // alert(phone);
        $('#remember_phone').append(
            `<input type="hidden" value="`+phone+`" class="remember_phone">`
        );
        $('#get_phone').append(
            phone
        );
        $.ajax({
            url: "/dashboard/check-phone-number",
            type: "POST",
            data: {
                phone: phone,
            },
            success: function (resp) {
                if (resp["status"] == 1) {
                    $("#exampleModalCenterConfirmPhone").modal("hide");
                    let timerOn = true;
                    function timer(remaining) {
                    var m = Math.floor(remaining / 60);
                    var s = remaining % 60;
                    m = m < 10 ? "0" + m : m;
                    s = s < 10 ? "0" + s : s;
                    document.getElementById("countdown").innerHTML = `Time left: ${m} : ${s}`;
                    remaining -= 1;
                    if (remaining >= 0 && timerOn) {
                        setTimeout(function () {
                        timer(remaining);
                        }, 1000);
                        document.getElementById("resend").innerHTML = `
                        `;
                        return;
                    }
                    if (!timerOn) {
                        return;
                    }
                    document.getElementById("resend").innerHTML = `Don't receive the code?
                    <a href="javascript:void(0)" class="font-weight-bold text-color cursor" data-phone=`+phone+`>Resend</a>`;
                    }
                    timer(60);
                    $('#resend').click(function(){
                        timer(60);
                        $.ajax({
                            url: "/dashboard/check-phone-number",
                            type: "POST",
                            data: {
                                phone: phone,
                            },
                            success: function (resp) {

                            },
                            error: function () {
                                alert("ERROR");
                            },
                        });
                    });
                    $("#exampleModalCenterForgotPassword").modal("show");
                } else {
                    alert("SOMETHINGS WRONG!");
                }
            },
            error: function () {
                alert("ERROR");
            },
        });
    });
    $(".forgot_password").click(function () {
        // alert(1);
        var first = $("#first").val();
        var second = $("#second").val();
        var third = $("#third").val();
        var fourth = $("#fourth").val();
        var fifth = $("#fifth").val();
        var phone = $(".phone").val();
        $('#last_phone').append(
            `<input type="hidden" value=`+phone+` name="phone">`
        );
        $.ajax({
            url: "/dashboard/check-code",
            type: "POST",
            data: {
                first: first,
                second: second,
                third: third,
                fourth: fourth,
                fifth: fifth,
                phone: phone,
            },
            success: function (resp) {
                if (resp["status"] == 1) {
                    $("#exampleModalCenterForgotPassword").modal("hide");
                    $("#exampleModalCenterChangePassword").modal("show");

                } else {
                    alert("SOMETHINGS WRONG!");
                }
                // console.log(resp);
            },
            error: function () {
                alert("ERROR");
            },
        });
    });
    $('.image-new').click(function(){

        var id=$(this).data('id');
        // alert(id);
        $.ajax({
            url:'/dashboard/check-reading',
            type:"POST",
            data:{
                id:id,
            },
            success:function(resp){

            },
            error:function(){
                alert('ERROR');
            }
        })
    });

});
$("#input-id").rating();
document.addEventListener("DOMContentLoaded", function (event) {
    function OTPInput() {
        const inputs = document.querySelectorAll("#otp > *[id]");
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener("keydown", function (event) {
                if (event.key === "Backspace") {
                    inputs[i].value = "";
                    if (i !== 0) inputs[i - 1].focus();
                } else {
                    if (i === inputs.length - 1 && inputs[i].value !== "") {
                        return true;
                    } else if (event.keyCode > 47 && event.keyCode < 58) {
                        inputs[i].value = event.key;
                        if (i !== inputs.length - 1) inputs[i + 1].focus();
                        event.preventDefault();
                    } else if (event.keyCode > 64 && event.keyCode < 91) {
                        inputs[i].value = String.fromCharCode(event.keyCode);
                        if (i !== inputs.length - 1) inputs[i + 1].focus();
                        event.preventDefault();
                    }
                }
            });
        }
    }
    OTPInput();
});
