//$('body').on('hidden.bs.modal', '.modal', function () {
//    $(this).removeData('bs.modal');
//});
//
//$('body').on('shown.bs.modal', function () {
//    $(this).removeData('bs.modal');
//});


function showPayment(id)
{
    $.ajax({
        url: "http://dev.serlimar/payment/" + id + "/show",
        context: document.body
    }).done(function(data) {
    
        $('#myModal .modal-content').empty();
        $('#myModal .modal-content').append(data);
        $('#myModal').modal('show');
    });
    
}
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
            //The payment is updated
            if('saved' === data)
            {
                 $('#myModal .modal-content').modal('hide');
                 location.reload();
                 
            }
            //The form has errors and has to be shown with the errors.
            else{
                  $('#myModal .modal-content').empty();
                  $('#myModal .modal-content').append(data);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            alert('Update has failed');    
        }
    });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
});
 
$("form").submit(); //Submit  the FORM
}


function printPayment()
{
    window.print();
}