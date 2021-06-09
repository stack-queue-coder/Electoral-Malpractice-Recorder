<!DOCTYPE html>
<html lang="en">
<head>
    <title>Location</title>
</head>
<body>
    <h1>I am tracing yo location</h1>
    <button onclick="getLocation()">Get location</button>

    <div id="output"></div>    


    <script src="https://code.jquery.com/jquery-2.2.4.min.js" ></script>
    <script>

        var x = document.getElementById('output');
        
        function getLocation(){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition);
            }
            else{
                alert("failed")
            }
        }

        function showPosition(position){
            // x.innerHTML = "Latitude = "+ position.coords.latitude+"<br>" ;
            // x.innerHTML += "Longitude = "+position.coords.longitude+"<br>" ;

            var api = "https://api.bigdatacloud.net/data/reverse-geocode-client?latitude="+ position.coords.latitude+"&longitude="+position.coords.longitude+"&localityLanguage=en"
           // var locAPI = "http://maps.googleapis.com/maps/api/geocode/json?latlng="+position.coords.latitude+","+position.coords.longitude+"&sensor=true";

            // x.innerHTML = locAPI;
            
            $.get({
                url : api,
                success: function(data){
                    console.log(data);

                    x.innerHTML = data.city+",";
                    x.innerHTML += data.localityInfo.administrative[2].name+",";
                    x.innerHTML += data.localityInfo.administrative[1].name;
                } 
            });
        
        }

    </script>
</body>
</html>