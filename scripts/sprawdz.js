$(function (){
    
    $('#zaloguj').click(function(event){
        
        event.preventDefault();
        
        
        var login = $('#login').val();
        var haslo = $('#haslo').val();
        
        $.ajax({
            
            type:"POST",
            url: "sprawdz_2.php",
            data:{
                login: login,
                haslo: haslo
            },
            success: function(odpowiedz){
                
                if(odpowiedz !==''){
                    $('#modal').hide().fadeIn(1000).delay(1600).fadeOut(1000);
                    $('#wiadomosc').html(odpowiedz);
                    
                }else{
                    $('#MyForm').submit();
                }
                
            }
            
        });
        
    });
    
}) ;