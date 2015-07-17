//$('body').on('hidden.bs.modal', '.modal', function () {
//    $(this).removeData('bs.modal');
//});
//
//$('body').on('shown.bs.modal', function () {
//    $(this).removeData('bs.modal');
//});

function getPayment(id)
{
    //alert(id);
    $.ajax({
        url: "http://dev.serlimar/payment/" + id + "/update",
        context: document.body
    }).done(function(data) {
    
        $('#myModal .modal-content').empty();
        $('#myModal .modal-content').append(data);
        $('#myModal').modal('show');
    });
}
function updatePayment(id){

$("form").submit(function(e)
{
    var postData = $(this).serializeArray();
   // var formURL = $(this).attr("action");
    $.ajax(
    {
        url : "http://dev.serlimar/payment/" + id + "/update",
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            if('saved' === data)
            {
                 $('#myModal .modal-content').modal('hide');
                 location.reload();
            }else{
                  $('#myModal .modal-content').empty();
                  $('#myModal .modal-content').append(data);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            alert('fail');    
        }
    });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
});
 
$("form").submit(); //Submit  the FORM
}

function confirmDelete(msg, url) {
	var answer = confirm(msg);
	if (answer){
		window.location = url;
	}
}	