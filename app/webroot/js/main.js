$(document).ready(function(){
    var sPageURL = decodeURIComponent( window.location.href.slice( window.location.href.indexOf( '?' ) + 1 ) );

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    $('[data-toggle="tooltip"]').tooltip();

    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;                        
            });
        } else{
            checkbox.each(function(){
                this.checked = false;                        
            });
        } 
    });

    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });

    if(sPageURL.match(/edit/)){
        $('datepicker').datepicker({
            format: 'dd/mm/yyyy',
             autoclose: true,
            closeOnDateSelect: true
        }); 
    }

    $('.msg-remove').on('click', function(){
        $('#deleteEmployeeModal').modal('show');
        $('.delete-Message').attr({'for':$(this).attr('for')});
    });

    $('.delete-Message').on('click', function(){
        var msgHandler = $(this).attr('for');
        $.get('messages/generaldelete/' + $(this).attr('for'), function(){
            console.log('data');
        });
        $('#ct' + msgHandler).fadeOut('slow');
    });

 $(".js-example-basic-single").select2({
   formatResult: format,
    formatSelection: format,
    escapeMarkup: function(m) { return m; }
 });
});

function format(state) {
    if (!state.id) 
    return state.text;
    return "<img class='flag' src='http://icons.iconarchive.com/icons/designbolts/free-multimedia/1024/Photo-icon.png' width='25'/> " + state.text;
}



function customAlertModal(pram = ''){  
    var model_Html =    '<div id="customAlertModal" class="modal fade">'
                            +'<div class="modal-dialog">'
                                +'<div class="modal-content">'
                                    +'<div class="modal-header" style="text-align:center!important;">'                     
                                        +'<h4 class="modal-title">Thank you for registering</h4>'
                                    +'</div>'
                                    +'<div class="modal-footer" style="text-align:center!important;">'
                                        +'<a href="login" class="btn  btn-success">Back to Homepage</a>'
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                        +'</div>';
    var getcustomAlertModal = $('#customAlertModal').length;                   
    if(getcustomAlertModal > 0) $('#customAlertModal').remove();
    $('body').append(model_Html);    
    $('#customAlertModal').modal('show');
}


function onRegister(event){
    var name = $('#name');
    var email = $('#email');
    var password = $('#password');
    var confpassword = $('#confpassword'); 
    var Alertmodal = 0;
    var message_type, message_title, message_content, btnCancel, btnProceed, btnClass;

    $('span[class$=-alert]').empty();
    $('input.alert').removeClass('alert');

    if(name.val().replace(/\s/g, '') == '' || (name.val().replace(/\s/g, '').length < 5 || name.val().replace(/\s/g, '').length > 20)){
        var spanAlert = name.attr('id') + '-alert';
        $('span.' + spanAlert).text('*Name should be 5-20 Characters');
        name.addClass('alert');

    } else if(email.val().replace(/\s/g, '') == '' || !email.val().match(/@/)){
        var spanAlert = email.attr('id') + '-alert';
        $('span.' + spanAlert).text('*Invalid email');
        email.addClass('alert');

    } else if(password.val().replace(/\s/g, '').length < 8){
        var spanAlert = password.attr('id') + '-alert';
        $('span.' + spanAlert).text('*Password must be atleast 8 characters');
        password.addClass('alert');

    } else if(password.val() != confpassword.val().replace(/\s/g, '')){
        var spanAlert = confpassword.attr('id') + '-alert';
        $('span.' + spanAlert).text('*Password mismatch');
        confpassword.addClass('alert');

    }else{
         
        $.get('users/checkemail/'+email.val(), {'checkemail':'email'}, function(response){
              
            if(response.length == 0){
                $.post('users/add/', {name:name.val(), email:email.val(), password:password.val()}, function(repUser){
                    if(!jQuery.isEmptyObject(repUser)){
                        customAlertModal(repUser.user_id);
                    }
                },"json");    
            }else{
                var spanAlert = email.attr('id') + '-alert';
                $('span.' + spanAlert).text('*Email was already exist');
                email.addClass('alert');
            }
        }, "json");
    }

}


var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
};

