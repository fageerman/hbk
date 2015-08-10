/***************************Payment functions**********************************/
function showPayment(id)
{
    $.ajax({
        url: "payment/" + id + "/show",
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
        url: "payment/" + id + "/update",
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
        url : "/payment/" + id + "/update",
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

/***************************End Payment functions**********************************/


/***************************User functions**********************************/

function showUser(id)
{
    $.ajax({
        url: "/user/" + id + "/show",
        context: document.body
    }).done(function(data) {
    
        $('#myModal .modal-content').empty();
        $('#myModal .modal-content').append(data);
        $('#myModal').modal('show');
    });
    
}

function prepareUser()
{
    $.ajax({
        url: "/user/create",
        context: document.body
    }).done(function(data) {
    
        $('#myModal .modal-content').empty();
        $('#myModal .modal-content').append(data);
        $('#myModal').modal('show');
    });
}

function createUser()
{
    $("form").submit(function(e)
    {
        var postData = $(this).serializeArray();
       // var formURL = $(this).attr("action");
        $.ajax(
        {
            url : "/user/create",
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
                alert('Create has failed');    
            }
        });
        e.preventDefault(); //STOP default action
        e.unbind(); //unbind. to stop multiple form submit.
    });

    $("form").submit(); //Submit  the FORM
}


function getUser(id)
{
    //alert(id);
    $.ajax({
        url: "/user/" + id + "/update",
        context: document.body
    }).done(function(data) {
    
        $('#myModal .modal-content').empty();
        $('#myModal .modal-content').append(data);
        $('#myModal').modal('show');
    });
}

function updateUser(id){

$("form").submit(function(e)
{
    var postData = $(this).serializeArray();
   // var formURL = $(this).attr("action");
    $.ajax(
    {
        url : "/user/" + id + "/update",
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

/***************************End User functions**********************************/




/***************************Role functions**********************************/

function showRole(id)
{
    $.ajax({
        url: "/role/" + id + "/show",
        context: document.body
    }).done(function(data) {
    
        $('#myModal .modal-content').empty();
        $('#myModal .modal-content').append(data);
        $('#myModal').modal('show');
    });
    
}

function prepareRole()
{
    $.ajax({
        url: "/role/create",
        context: document.body
    }).done(function(data) {
    
        $('#myModal .modal-content').empty();
        $('#myModal .modal-content').append(data);
        $('#myModal').modal('show');
    });
}

function createRole()
{
    $("form").submit(function(e)
    {
        var postData = $(this).serializeArray();
      
       // var roleCollectionData = [postData[0],postData[postData.length-1]];
       // var rolesData = postData.splice(0, 1)
        
        $.ajax(
        {
            url : "/role/create",
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
                alert('Create has failed');    
            }
        });
        e.preventDefault(); //STOP default action
        e.unbind(); //unbind. to stop multiple form submit.
   });
    
    $("form").submit(); //Submit  the FORM
}


function getRole(id)
{
    $.ajax({
        url: "/role/" + id + "/update",
        context: document.body
    }).done(function(data) {
    
        $('#myModal .modal-content').empty();
        $('#myModal .modal-content').append(data);
        $('#myModal').modal('show');
    });
}

function updateRole(id){

$("form").submit(function(e)
{
    var postData = $(this).serializeArray();
   // var formURL = $(this).attr("action");
    $.ajax(
    {
        url : "/role/" + id + "/update",
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

/***************************End Role functions**********************************/