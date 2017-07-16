$(document).ready(function () { 
if (typeof(Storage) !== "undefined") {
    $("#list").html(localStorage.getItem("list")) 
}
    
$('#form').on('submit', function () {
        var value = $('#text').val();
        var divElm = $("<div></div>", {"class":"unchecked"});
        $("<span></span>", {"text":value}).appendTo(divElm);
        $("<input></input>", {"type":"text","value":"",class:"editVal"}).appendTo(divElm).hide();
        $("<input></input>", {"type":"button","value":"Save",class:"save",style: "display: inline-block"}).appendTo(divElm).hide();
        $("<input></input>", {"type":"button","value":"Edit",class:"edit"}).appendTo(divElm);
        $("<input></input>", {"type":"button","value":"X",class:"delete"}).appendTo(divElm);
        $('#list').append(divElm);
            
        
//        $('#list').append("<span>"+value+"</span><input type = \"button\" value = \"Edit\" class = \"edit\"/><input type= \"button\" value= \"X\" class = \"delete\"/>")
    $('#text').val('')
    save();
}); 
$('#add').on('click', function () {
        var value = $('#text').val();
        var divElm = $("<div></div>", {"class":"unchecked"});
        $("<span></span>", {"text":value}).appendTo(divElm);
        $("<input></input>", {"type":"text","value":"",class:"editVal"}).appendTo(divElm).hide();
        $("<input></input>", {"type":"button","value":"Save",class:"save",style: "display: inline-block"}).appendTo(divElm).hide();
        $("<input></input>", {"type":"button","value":"Edit",class:"edit"}).appendTo(divElm);
        $("<input></input>", {"type":"button","value":"X",class:"delete"}).appendTo(divElm);
        $('#list').append(divElm);
            
        
//        $('#list').append("<span>"+value+"</span><input type = \"button\" value = \"Edit\" class = \"edit\"/><input type= \"button\" value= \"X\" class = \"delete\"/>")
    $('#text').val('')
    save();
}); 
$('#list').on('click', '.delete', function () {
    $(this).parent("div").remove();
    save();
});
$('#list').on('click', '.edit', function () {
    $(".open").click();
    var $span = $(this).siblings("span");
    var value = $span.text();
    $("#text").val(value);
    $("#add").val("Save");
    $(this).siblings(".editVal").val(value);
    $(this).siblings(".editVal").show();
    $(this).siblings(".save").show().toggleClass("open");
    $(this).siblings("span").hide();
    $(this).hide(); 
});
$('#list').on('click', '.save', function () {
    var value = $(this).siblings(".editVal").val();
    $(this).siblings("span").text(value);
    $(this).siblings(".editVal").hide();
    $(this).siblings(".edit").show();
    $(this).siblings("span").show();
    $(this).hide().toggleClass("open");
    save();
}); 
$('#list').on('click', 'span', function () {
    $(this).parent("div").toggleClass("checked");
    $(this).parent("div").toggleClass("unchecked");
    save();
});
function save()
{
    localStorage.setItem("list",$("#list").html())
}
});