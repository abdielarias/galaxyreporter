<?php

include 'header.php';

 ?>


  <body id="APOD-page">
    <div id="APOD-banner">
      <h1>Picture of the Day (NASA API)</h1>
    </div>

    <div>

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

var url = "https://images-api.nasa.gov/search?q=mars";

  fetch(url)
  .then((res)=>res.json())
  .then((dataObject)=>{


    console.log(dataObject);
  })
  .catch((err)=>{console.log(err)});



</script>


</html>
