
$('#submit1').click(function(){
var x = document.getElementById("demo");

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }



function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;


  var apikey = 'dd23949b2baa4598a19d75070f1be9ae';
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;
 

  var api_url = 'https://api.opencagedata.com/geocode/v1/json'

  var request_url = api_url
    + '?'
    + 'key=' + apikey
    + '&q=' + encodeURIComponent(latitude + ',' + longitude)
    + '&pretty=1'
   

  // see full list of required and optional parameters:
  // https://opencagedata.com/api#forward

  var request = new XMLHttpRequest();
  request.open('GET', request_url, true);

  request.onload = function() {
    // see full list of possible response codes:
    // https://opencagedata.com/api#codes

    if (request.status == 200){ 
      // Success!
      var data = JSON.parse(request.responseText);
      //console.log(data);
 

     
     
     
      const countryname = data.results[0].components.country;
   alert(countryname);
      
console.log(countryname);


  
 
      $.ajax({
        url: "lib/php/get.php",
        type: 'POST',
        dataType: 'json',
        data: {
          countryCode: countryname,
          
        },
        success: function(result) {
    
          console.log(result);
        
            if (result.status.name == "ok") {
              
              if (map.hasLayer(border)) {
    
                map.removeLayer(border);
    
            }
    
    
    
            border = L.geoJson(result.data,{
    
                color: '#ff7800',
    
                weight: 2,
    
                opacity: 0.65
    
            }).addTo(map);         
    
           
    
            map.fitBounds(border.getBounds());


     

      
      
      $.ajax({
        url: "lib/php/country.php",
        type: 'POST',
        dataType: 'json',
        data: {
          country:countryname,
          
        },
        success: function(result2) {
    
          console.log(result2);
      
            if (result2.status.name == "ok") {
            
              $('#nam').html("<h2><strong> Name of Country is <strong> "+result2['data'][0]['name']+"</h3>");
              $('#capita').html("<h3><strong>Capital:</strong> "+result2['data'][0]['capital']+" </h3>");
              $('#regi').html("<h3><strong> Region :</strong> "+result2['data'][0]['region']+" </h3>");
              $('#populatio').html("<h3><strong> Population :</strong> "+result2['data'][0]['population']+" </h3>");
              $('#language').html("<h3><strong> Languages :</strong> "+result2['data'][0]['languages'][0]['name']+" </h3>");
              $('#currencie').html("<h3><strong> Currencies :</strong> "+result2['data'][0]['currencies'][0]['name']+" </h3>");
              $('#la').html("<h3><strong> Lat and lng :</strong> "+result2['data'][0]['latlng']+" </h3>");
              $.ajax({
                url: "lib/php/getweather.php",
                type: 'POST',
                dataType: 'json',
                data: {
                  country:countryname,
                  
                },
                success: function(result) {
            
                  console.log(result);
    
                  if (result.status.name == "ok" ) {
                    
                    $('#name').html("<h2 > Current weather   "+result['data']['name']+" ,  "+result['data']['sys']['country']+" </h2>");
                    $('#pressur').html("<h3> <strong>Pressure:</strong> "+result['data']['main']['pressure']+" hpa</p>");
                    $('#tempratur').html("<h3> <strong>Temprature: </strong>"+result['data']['main']['temp']+" &deg;C </p>");
                    $('#mi').html("<h3><strong>Min-Temp:</strong> "+result['data']['main']['temp_min']+" </p>");
                    $('#ma').html("<h3><strong> Max-temp: </strong>"+result['data']['main']['temp_max']+" </p>");
                    $('#humidit').html("<h3><strong> Humidity:</strong> "+result['data']['main']['humidity']+"% </p>");
                    $('#win').html("<h3><strong> Wind Speed: </strong>"+result['data']['wind']['speed']+"m/s </p>");
                    
                       
                    $("#weathe").html("<h3><strong> Weather Description:</strong><img src='https://openweathermap.org/img/wn/"+result['data']['weather'][0]['icon']+".png'>"+result['data']['weather'][0]['description']+"</h3>");
                     
                  }
                }
              });

  
      
                    
                    
                      
                  }
              
              
                
              
               },
             
              
               
              }); 
              
              
         
                                      
            
            
            
    
    
     
                
                }
                



              }
    
    
              
              
    
              })
              
            

              
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
       
    



























































































              
        
          } else if (request.status <= 500){ 
            // We reached our target server, but it returned an error
                                 
            console.log("unable to geocode! Response code: " + request.status);
            var data = JSON.parse(request.responseText);
            console.log(data.status.message);
          } else {
            console.log("server error");
          }
        };
      
        request.onerror = function() {
          // There was a connection error of some sort
          console.log("unable to connect to server");        
        };
      
        request.send();  // make the request
      }
           
    })