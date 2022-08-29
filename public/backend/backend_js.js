$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#password").keyup(function () {
        var password = $(this).val();
        $.ajax({
            url: "/admin/check-password",
            type: "POST",
            data: {
                password: password,
            },
            success: function (resp) {
                if (resp["status"] == true) {
                    $("#alert-warning").html(`
                        <span style="color:green">Password correct</span>
                    `);
                } else {
                    $("#alert-warning").html(`
                        <span style="color:red">Password incorrect</span>
                    `);
                }
            },
            error: function (err) {
                alert(err);
            },
        });
    });
    $('.select-all').click(function(){
        if(this.checked==true){
            $('input:checkbox').each(function(){
                this.checked=true;
            });
        }else{
            $('input:checkbox').each(function(){
                this.checked=false;
            });
        }
    })
    $(".change-status-project").click(function () {
        var id = $(this).data("id");
        var text = $(this).text();
        $.ajax({
            url: "/admin/change-status/project",
            type: "POST",
            data: {
                id: id,
                text: text,
            },
            success: function (resp) {
                if (resp["status"] == false) {
                    $("#project-" + id).html(`
                    <a  data-id="{{$project['id']}}" id="project-{{$project['id']}}" class="text texture-danger change-status">Inactive</a>
                    `);
                } else {
                    $("#project-" + id).html(`
                    <a  data-id="{{$project['id']}}" id="project-{{$project['id']}}" class="text texture-success change-status">Active</a>
                    `);
                }
            },
            error: function () {
                alert("ERROR");
            },
        });

    });
    $(".change-status-new").click(function () {
        var id = $(this).data("id");
        var text = $(this).text();
        $.ajax({
            url: "/admin/change-status/new",
            type: "POST",
            data: {
                id: id,
                text: text,
            },
            success: function (resp) {
                if (resp["status"] == false) {
                    $("#new-" + id).html(`
                    <a  data-id="{{$new['id']}}" id="new-{{$new['id']}}" class="text texture-danger change-status">Inactive</a>
                    `);
                } else {
                    $("#new-" + id).html(`
                    <a  data-id="{{$new['id']}}" id="new-{{$new['id']}}" class="text texture-success change-status">Active</a>
                    `);
                }
            },
            error: function () {
                alert("ERROR");
            },
        });
    });
});
var loadfile = function (event) {
    // var output = document.getElementsById("output");
    // output.src = URL.createObjectURL(event.target.files[0]);
    $('#preview').html('');
    for(let i=0; i<event.target.files.length; ++i){
        var image = document.createElement('img');
        image.src = URL.createObjectURL(event.target.files[i]);
        image.width = "100";
        image.height="100";
        document.querySelector("#preview").appendChild(image);
    }
};
