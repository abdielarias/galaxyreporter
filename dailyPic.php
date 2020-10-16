<?php

include 'header.php';

 ?>


  <body id="APOD-page">
    <div id="APOD-banner">
      <h1>Picture of the Day</h1>
      <p>(NASA's APOD API)</p>
      <p id="APOD-date"></p>
    </div>

    <div id="APOD-wrapper">
      <p id="APOD-title"></p>


      <img id="picOfDay">

      <p id="APOD-copyright"></p>

      <p id="APOD-explanation"></p>
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

var url = "https://api.nasa.gov/planetary/apod?api_key=GskJNne3jHgubSyaUxqQGNeoK5nyH0lc7xA8quYm&date="+dateTimeFormat;

  fetch(url)
  .then((res)=>res.json())
  .then((dataObject)=>{

    console.log(dataObject);

    if(dataObject.code == "404"){
      var error = document.querySelector("#APOD-title");
      error.innerHTML = dataObject.msg;
    }
    else if(dataObject.media_type == "video"){
      console.log("video detected");

      var title = document.querySelector("#APOD-title");
      title.innerHTML = dataObject.title;

      var date = document.querySelector("#APOD-date");
      date.innerHTML = dataObject.date;

      var copyright = document.querySelector("#APOD-copyright");
      if(dataObject.copyright){
        copyright.innerHTML = "copyright: "+dataObject.copyright;
      }

      //treat as video
      var imgDiv = document.querySelector("#picOfDay");


      var iframe = document.createElement("iframe");
      iframe.classList.add("APOD-iFrame");
      iframe.src = dataObject.url;
      imgDiv.before(iframe);


      var desc = document.querySelector("#APOD-explanation");
      desc.innerHTML = dataObject.explanation;

    }
    else {

      var title = document.querySelector("#APOD-title");
      title.innerHTML = dataObject.title;

      var date = document.querySelector("#APOD-date");
      date.innerHTML = dataObject.date;

      var copyright = document.querySelector("#APOD-copyright");
      if(dataObject.copyright){
        copyright.innerHTML = "copyright: "+dataObject.copyright;
      }

      var imgDiv = document.querySelector("#picOfDay");
      imgDiv.src = dataObject.url;

      var desc = document.querySelector("#APOD-explanation");
      desc.innerHTML = dataObject.explanation;
    }
  })
  .catch((err)=>{console.log(err)});



</script>


</html>
