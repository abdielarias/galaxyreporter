<?php

include 'header.php';

 ?>


  <body id="asteroids-page">
    <div id="asteroids-banner">
      <h1 style="margin:0;padding:20px">Near Earth Objects</h1>
      <h3 style="margin:0;padding-bottom:20px">(NASA's NeoWs API)</h3>
    </div>

    <p id="numberOfNeos"></p>

    <div id="asteroidDiv">
    </div>


  </body>

<script>



//get todays date
let datetime = new Date();

let year = datetime.getFullYear();
let month = datetime.getMonth() + 1;
month.toString();
if(month<10){
  month = "0"+month;
}
let dayOfMonth = datetime.getDate();
dayOfMonth.toString();
if(dayOfMonth<10){
  dayOfMonth = "0"+dayOfMonth;
}

let dateTimeFormat = year + "-" + month + "-" + dayOfMonth;

var url = "https://api.nasa.gov/neo/rest/v1/feed?api_key=GskJNne3jHgubSyaUxqQGNeoK5nyH0lc7xA8quYm";

  fetch(url)
  .then((res)=>res.json())
  .then((dataObject)=>{

    // var title = document.querySelector("#APOD-title");
    // title.innerHTML = dataObject.title;


    // console.log(dataObject);
    var todaysAsteroidArray;
    console.log();

    if(dataObject.near_earth_objects[dateTimeFormat]){
      todaysAsteroidArray = dataObject.near_earth_objects[dateTimeFormat];
    }
    else {
      //set the time to one day further

      datetime.setDate(datetime.getDate() + 1);

      year = datetime.getFullYear();
      month = datetime.getMonth() + 1;
      month.toString();
      if(month<10){
        month = "0"+month;
      }
      dayOfMonth = datetime.getDate();
      dayOfMonth.toString();
      if(dayOfMonth<10){
        dayOfMonth = "0"+dayOfMonth;
      }

      let dateTimeFormat = year + "-" + month + "-" + dayOfMonth;

      todaysAsteroidArray = dataObject.near_earth_objects[dateTimeFormat];
    }


    var numberOfNeos = document.querySelector("#numberOfNeos");
    numberOfNeos.innerHTML = "For the date of "+month+"/"+dayOfMonth+"/"+year+", there are "+todaysAsteroidArray.length+" objects at their nearest point from Earth in their orbit.";


    //Loop though for each element in the array and show panels of NEO data.
    todaysAsteroidArray.forEach((item, i) => {

      var asteroidDiv = document.querySelector("#asteroidDiv");
      var panel = document.createElement("div");
      panel.classList.add("asteroidPanel");
      panel.id = "asteroid"+i;

      panel.innerHTML += `

      <div class="asteroidBGDiv" style="text-align:center;background-image:url('images/starsBG.jpg');">
        <img src="images/asteroid${Math.floor(Math.random() * 17)}.png" alt="asteroid">

      </div>
      <p style="font-size:.8em;margin:0;color:#404040;">Not Actual Image</p>
      <table class="asteroidTable">
      <tr>
        <td style=" border-top-left-radius:15px;">Name: </td>
        <td style="border-top-right-radius:15px;">${item.name}</td>
      </tr>

      <tr>
        <td>orbiting body:</td>
        <td>${item.close_approach_data[0].orbiting_body}</td>
      </tr>

      <tr>
        <td>estimated diameter range: </td>
        <td>${Math.trunc(item.estimated_diameter.feet.estimated_diameter_min)} - ${Math.trunc(item.estimated_diameter.feet.estimated_diameter_max)} feet </td>
      </tr>

      <tr>
        <td>relative velocity:</td>
        <td>${Math.trunc(item.close_approach_data[0].relative_velocity.miles_per_hour)} miles per hr</td>
      </tr>

      <tr>
        <td>missing Earth by a distance of:</td>
        <td>${Math.trunc(item.close_approach_data[0].miss_distance.miles)} miles</td>
      </tr>

      <tr>
        <td colspan="2" style=" border-bottom-left-radius:15px;border-bottom-right-radius:15px;"><a href='${item.nasa_jpl_url}' style="font-size: 12pt;">Click here for more info about ${item.name} from NASA's Jet Propulsion Labs</a></td>
      </tr>

      </table>

      `;


      asteroidDiv.appendChild(panel);

      $("#asteroid"+i).fadeIn(1000+(i*200));

    });






  })
  .catch((err)=>{console.log(err)});



</script>


</html>
