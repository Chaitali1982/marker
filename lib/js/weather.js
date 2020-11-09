

$('#submit').click(function() {

	$.ajax({
		url: "lib/php/getweather.php",
		type: 'POST',
		dataType: 'json',
		data: {
			country: $('#data').val(),
			
		},
		success: function(result) {

			console.log(result);
	
try{
			if (result.status.name == "ok" ) {
				
				$('#name1').html("<h2 > Current weather   "+result['data']['name']+" ,  "+result['data']['sys']['country']+" </h2>");
				$('#pressure').html("<h3> <strong>Pressure:</strong> "+result['data']['main']['pressure']+" hpa</p>");
				$('#temprature').html("<h3> <strong>Temprature: </strong>"+result['data']['main']['temp']+" &deg;C </p>");
				$('#min').html("<h3><strong>Min-Temp:</strong> "+result['data']['main']['temp_min']+" </p>");
				$('#max').html("<h3><strong> Max-temp: </strong>"+result['data']['main']['temp_max']+" </p>");
				$('#humidity').html("<h3><strong> Humidity:</strong> "+result['data']['main']['humidity']+"% </p>");
				$('#wind').html("<h3><strong> Wind Speed: </strong>"+result['data']['wind']['speed']+"m/s </p>");
				
				   
				$("#weather").html("<h3><strong> Weather Description:</strong><img src='https://openweathermap.org/img/wn/"+result['data']['weather'][0]['icon']+".png'>"+result['data']['weather'][0]['description']+"</h3>");
				 
			
				

			}
		}
		
		catch (err) {
			errorHandler();
			
		}
	 },
	 error: function( jqXHR, textStatus, errorThrown) {
		 //if body is empty we end up here
		 errorHandler();  
	   }
 
	 
 }); 


});
function errorHandler(){
	$('#name').html('')
	$('#main').html('')
	$('#pressure').html('')
	$('#temprature').html('')
	$('#min').html('')
	$('#max').html('')
	$('#humidity').html('')
	$('#wind').html('')
	$("#error").html("<div class ='alert alert-danger' id='errorCity'> <a href ='#'class='close' data-dismiss='alert' aria-label='Close'>&times;</a>City field can not be empty</div>");
}

    