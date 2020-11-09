
$(document).ready(function(){

$(function(){	
    var countryOptions;
$.ajax({
            url: "lib/php/getCountryData.php",
            type: 'POST',
            dataType: 'json',
           
            success: function(result) {
    
             
              if(result.data.length){
                  for(var i= 0;i<result.data.length;i++){
                    countryOptions+="<option value='"
                    +result.data[i].name+
                    "'>"
                    +result.data[i].name+
                    "</option>";
                     }
                     $('#data').html(countryOptions);
                    }
		
                 
             
  
               
              
            }
           
            });
        });


       


















      });
        
    
   
