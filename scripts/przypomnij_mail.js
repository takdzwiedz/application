// to be continued

//$(function (){
//    
//    $('#przypomnij').click(function(event){
//
//        event.preventDefault();
//        
//        var mail = $('#mail').val();
//
////        alert ('Mis');
//        $.ajax({
//            
//            type:"POST",
//            url: "przypomnij_mail.php",
//            data: {
//                login: mail
//            
//            },
//            success: function(odpowiedz){
//                alert(odpowiedz);
//                if(odpowiedz !==''){
//                    $('#modal').hide().fadeIn(1000).delay(1000).fadeOut(1000);
//                    $('#wiadomosc').html(odpowiedz);
//                    
//                }else{
//                    $('#MyForm').submit();
//                }
//                
//            }
//            
//        });
//        
//        
//    });
//    
//    
//});