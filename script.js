$(document).on('click', '.remove', function() {
    var parent = $(this).parent();
    var id = parent.data('id');
    parent.slideUp();
    makeAjaxResponse('delete', id);
});


$(document).on('click', '.completed', function() {
    var parent = $(this).parent();
    var id = parent.data('id');
    parent.toggleClass("done" );
    makeAjaxResponse('done', id);
});

$( "ul" ).sortable();

$(".add").click(function(){
    $(".new-task").slideToggle();
    $("#todo-text").focus();
});

// Pressing enter
$(document).keypress(function(e) {
    var str = $( "#todo-text" ).val();

    if(e.which == 13 && str != "" && str != null ) {
        $( "<li class='row'><a class='remove' href='#'><i class='fa fa-trash-o'></i></a><a class='completed' href='#'><i class='fa fa-check'></i></a>"+ str +"</li>" ).fadeIn().appendTo("ul");
        $( "#todo-text" ).val("");
        $( "#todo-text" ).focus();
        makeAjaxResponse('add', str);
    }
});

// Press the + sign
$(".add-new").click(function(){
    var str = $( "#todo-text" ).val();

    if( str != "" && str != null) {
        $("<li class='row'><a class='remove' href='#'><i class='fa fa-trash-o'></i></a><a class='completed' href='#'><i class='fa fa-check'></i></a>" + str + "</li>").fadeIn().appendTo("ul");
        $("#todo-text").val("");
        $("#todo-text").focus();
        makeAjaxResponse('add', str);
    }
});

function makeAjaxResponse(method, val) {
    $.ajax({
        url: '/controller/'+method+'.php',
        data: {data: val},
        type: 'POST',
        success: function(data){
            alert(data);
        }
    });
}




