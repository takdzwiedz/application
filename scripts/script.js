$(function(){
    
//    alert ('WOW');
    
    $('#login').blur(function(){
        
//        alert ('WOW');
        
        if($(this).val().length > 1) {
        
        // obsługa zapytań AJAX przez jquery
        $.ajax({
            
            url:'sprawdz.php?login='+$(this).val(),
            
            success: function(s){
                
                if(s==='TAK'){
                    $('#loginSpan').html('Login zajęty').css('color','red');
                } else {
                    $('#loginSpan').html('Login OK!').css('color','green');
                }
            },
            
            error:function(e){
                
                alert('Błąd połączenia');
                
            }
            
        });
    } else{
        $('#loginSpan').empty();
    }
    
    });
    
    $('#mail').blur(function(){

//        alert ('WOW');

    // obsługa zapytań AJAX przez jquery
    $.ajax({

        url:'sprawdz.php?mail='+$(this).val(),

        success: function(s){

            if(s==='TAK'){
                $('#mailSpan').html('Mail zajęty').css('color','red');
            } else {
                $('#mailSpan').html('Mail OK!').css('color','green');
            }
        },

        error:function(e){

            alert('Błąd połączenia');

        }

    });

});
    
});
