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


    $('.msgReply-remove').on('click', function(){
        $('#deleteReplyModal').modal('show');
        $('.delete-MessageReply').attr({'for':$(this).attr('for')});
    });

    $('.delete-MessageReply').on('click', function(){
        var msgHandler = $(this).attr('for');
        $.get('../../messages/permessagedelete/' + $(this).attr('for'), function(resp){
        });
        $('#rply' + msgHandler).fadeOut('slow');
    });


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

    if(!sPageURL.match(/login/)){
        $('datepicker').datepicker({
            format: 'dd/mm/yyyy',
             autoclose: true,
            closeOnDateSelect: true
        }); 

        $(".js-example-basic-single").select2({
        formatResult: format,
        formatSelection: format,
        escapeMarkup: function(m) { return m; }
        });
    }

    $('div.viewconvo, p.viewconvo').on('click', function(e){
        window.location.href = "messages/reply/" + $(this).attr('data-account');
    });


    var scroll=$('div.convolist');
    scroll.animate({scrollTop: scroll.prop("scrollHeight")});

    if($('div[for=alerttemp]').length > 0){
        setInterval(function(){ $('div[for=alerttemp]').fadeOut() }, 1500);
    }

    $('input#editpassword').on('keyup', function(){
       $('div#divconpassword').fadeIn('fast');
    }); 

    $('input#sendreply').on('click', function(){
        var content = $('textarea[name=content]');
        var to_id = $('input[name=to_id]');
        $.post('../sendreply', {content:content.val(), to_id:to_id.val()}, function(){
            window.location.reload();
        })
    });   

});

function format(state) {
    if (!state.id)
    var userpp  =  $(state.element).attr('data-image'); 
    var optimage = $(state.element).attr('data-image'); 
    return "<img class='flag img-circle' src='"+ optimage +"' width='25'/>&nbsp;&nbsp;" + state.text;
    return state.text;
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
    $('div#registerError').empty().fadeOut('fast');
    if(name.val().replace(/\s/g, '') == '' || (name.val().replace(/\s/g, '').length < 5 || name.val().replace(/\s/g, '').length > 20)){
        $('div#registerError').text('*Name should be 5-20 Characters').fadeIn('fast');
    } else if(email.val().replace(/\s/g, '') == '' || !email.val().match(/@/)){
        $('div#registerError').text('*Invalid email').fadeIn('fast');
    } else if(password.val().replace(/\s/g, '').length < 8){
        $('div#registerError').text('*Password must be atleast 8 characters').fadeIn('fast');
    } else if(password.val() != confpassword.val().replace(/\s/g, '')){
        $('div#registerError').text('*Password mismatch').fadeIn('fast');
    }else{         
        $.get('users/checkemail/'+email.val(), {'checkemail':'email'}, function(response){              
            if(response.length == 0){
                $.post('users/add/', {name:name.val(), email:email.val(), password:password.val()}, function(repUser){
                    if(!jQuery.isEmptyObject(repUser)){
                        customAlertModal(repUser.user_id);
                    }
                },"json");    
            }else{
                $('div#registerError').text('*Email was already exist').fadeIn('fast');
            }
        }, "json");
    }
}


var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
};

