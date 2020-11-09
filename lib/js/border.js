

 
    $('#submit').click(function(){    
   


  
	$.ajax({
		url: "lib/php/get.php",
		type: 'POST',
		dataType: 'json',
		data: {
			countryCode: $('#data').val(),
			
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
          
          }
          }
        
      });
    });
    

