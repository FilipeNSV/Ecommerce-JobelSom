var resultPages = 6;
var page = 1;

$(document).ready(function() {
    pagination(page, resultPages);
});

function pagination(page, resultPages) 
{
    var data = {
        page: page,
        resultPages: resultPages
    }
    $.post('../../app/Model/Classes/Pagination.php', data, function(back){
        $("#pageProd").html(back);
    });
}