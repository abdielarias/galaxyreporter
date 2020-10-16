<?php

include 'header.php';

 ?>



	<div id="index-wrapper">
    <div id="indexOpening">

      <div>
        <h1>DISCOVER NEW WORLDS</h1>
      </div>
    </div>
  </div>

<script>

  $(document).ready(()=>{

    $("#indexOpening").hide();
    // $("#indexOpening").slideUp(0);
    // $("#indexOpening div h1").fadeOut(0);
    $("#indexOpening").fadeIn(()=>{

    $("#indexOpening div h1").fadeIn(3000).animate({color:"white"})

    }).animate({backgroundSize : "150%"}, 35000, "linear");



  });



</script>

<?php include 'footer.php'; ?>
