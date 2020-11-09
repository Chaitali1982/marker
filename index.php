
<!doctype html>
<html lang="en">
		<head>
		  <title></title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">

		    <!-- Load my style -->
      <link rel="stylesheet" href="lib/css/style.css">
     
      <link rel="shortcut icon" href="">
      <!-- Load Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Load Leaflet from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet@2.5.1/dist/esri-leaflet.js"
    integrity="sha512-q7X96AASUF0hol5Ih7AeZpRF6smJS55lcvy+GLWzJfZN+31/BQ8cgNx2FGF+IQSA4z2jHwB20vml+drmooqzzQ=="
    crossorigin=""></script>
  
  

  <!-- Load Esri Leaflet Geocoder from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin="">
  <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
    integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
    crossorigin=""></script>

    <script src="https://kit.fontawesome.com//22c417b056.js" crossorigin="anonymous"></script>
</head>

	
<style>
 body { margin:0; padding:0;  font-family: Arial, Helvetica, sans-serif;}
    #map { position: absolute; top:85px; bottom:0; right:0; left:0; }
 #basemaps-wrapper {
    position: absolute;
    top: 200px;
    right: 10px;
    z-index: 400;
    background:#2c3e50 ;
    padding: 10px;
  }
  #basemaps {
    margin-bottom: 5px;
  }
	select {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  appearance: none;
  outline: 0;
  box-shadow: none;
  border: 0 !important;
  background: #2c3e50;
  background-image: none;
}
/* Remove IE arrow */
select::-ms-expand {
  display: none;
}
/* Custom Select */
.select {
  position: relative;
  display: flex;
  width: 23em;
  height: 3em;
  line-height: 3;
  background: #2c3e50;
  overflow: hidden;
  border-radius: .25em;
}


#submit1{
  position: absolute;
    top: 250px;
    left: 13px;
    z-index: 550;
}
#airport{
  position: absolute;
    top: 300px;
    left: 13px;
    z-index: 550;
}
#remove{
  position: absolute;
    top: 350px;
    left: 13px;
    z-index: 550;
}
select {
  flex: 1;
  padding: 0 .5em;
  color: #fff;
  cursor: pointer;
}
/* Arrow */
.select::after {
  content: '\25BC';
  position: absolute;
  top: 0;
  right: 0;
  padding: 0 1em;
  background: #34495e;
  cursor: pointer;
  pointer-events: none;
  -webkit-transition: .25s all ease;
  -o-transition: .25s all ease;
  transition: .25s all ease;
}
/* Transition */
.select:hover::after {
  color: #f39c12;
}

h1{
    font-weight: 200;
    margin-top: 0px;
    padding:0px;
   
    color:white;
  
    
}
</style>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link" href="#"><h1>Gazetteer</h1></a>
        </li>
  
<li class="nav-item">
<a class="nav-link" href="#"><div class="select"><select  id="data"> <option selected>select country</option></select></div></a>

</li>

<li class="nav-item">  
<a class="nav-link" href="#"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="submit" data-target="#myModal"><i class="fas fa-globe fa-1x" style="color:blue"></i></button></a>
</li>
<li class="nav-item">  
<a class="nav-link" href="#"><button type="button" class="btn btn-info btn-lg"  id="remove" ><i class="fas fa-minus-circle fa-1x" style="color:red"></i></button></a>
</li>
<li class="nav-item">  
<a class="nav-link" href="#"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="submit1" data-target="#myModal1"><li class="fa fa-home fa-1x" style="color:green"></li></button></a>
</li>
<li class="nav-item">  
<a class="nav-link" href="#"><button type="button" class="btn btn-info btn-lg"  id="airport" ><li class="fas fa-fighter-jet"  style="color:black"></li></button></a>
</li>
</ul>
</div>
<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
       </li></ul><div>

    </nav>




    <p id="demo"></p>


    <div  id="map"  ></div>
    
    <div id="basemaps-wrapper" class="leaflet-bar">
      <select id="basemaps">
        <option value="Topographic">Topographic</option>
        <option value="Streets">Streets</option>
       
        <option value="Oceans">Oceans</option>
        <option value="Gray">Gray</option>
        <option value="Imagery">Imagery</option>
        <option value="ImageryClarity">Imagery (Clarity)</option>
        <option value="ImageryFirefly">Imagery (Firefly)</option>
        <option value="Physical">Physical</option>
      </select>
    
  </div>
  </div>
  <div id ="myModal"  class="modal">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
			
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<h4 class="modal-title">Country Information</h4>
			  </div>
			  <div class="modal-body">
				<div class="row">
  <table>
	

<tr><td id="country_flag"><img src="" alt=""  class="center"></td> </tr>
<tr><td id="name"></td></tr>								
<tr><td id="capital"></td></tr>								 
<tr><td id="regio"></td></tr>						  
<tr><td id="population"></td></tr>								
<tr><td id="currencies"></td></tr>
<tr><td id="languages"></td></tr>	
<tr><td id="rate"></td></tr>					
<tr><td id="lat"></td></tr>									
<tr><td id="name1"></td></tr>									  
<tr><td id="country"></td></tr>								
<tr><td id="main"></td></tr>	
<tr><td id="temprature"></td></tr>								  
<tr><td id="min"></td></tr>								
<tr><td id="max"></td></tr>							  
<tr><td id="humidity"></td>	</tr>							 
<tr><td id="wind"></td>	</tr>							
<tr><td id="weather"></td></tr>								  
<tr><td id="pressure"></td></tr>		
<tr><td id="border"></td></tr>	
					
		

</table>				
</div>
</div>
</div>
 </div>
  </div> 	
  <div id ="myModal1"  class="modal">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
			
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<h4 class="modal-title">Country Information</h4>
			  </div>
			  <div class="modal-body">
				<div class="row">
  <table>
	

<tr><td id="countr_flag"><img src="" alt=""  class="center"></td> </tr>
<tr><td id="nam"></td></tr>								
<tr><td id="capita"></td></tr>								 
<tr><td id="regi"></td></tr>						  
<tr><td id="populatio"></td></tr>								
<tr><td id="currencie"></td></tr>
<tr><td id="language"></td></tr>						
<tr><td id="la"></td></tr>									
<tr><td id="name"></td></tr>									  
<tr><td id="countr"></td></tr>								
<tr><td id="mai"></td></tr>	
<tr><td id="tempratur"></td></tr>								  
<tr><td id="mi"></td></tr>								
<tr><td id="ma"></td></tr>							  
<tr><td id="humidit"></td>	</tr>							 
<tr><td id="win"></td>	</tr>							
<tr><td id="weathe"></td></tr>								  
<tr><td id="pressur"></td></tr>		
<tr><td id="borde"></td></tr>						



					
</table>				
</div>
</div>
</div>
 </div>
  </div> 	




<script src="lib/js/select.js"></script>
<script src="lib/js/border.js"></script>



<script src="lib/js/mark.js"></script>
<script src="lib/js/location1.js"></script>
<script src="lib/js/userboundary.js"></script>

<script src="lib/js/country.js"></script>
<script src="lib/js/weather.js"></script>


</body>
</html>

 
  


