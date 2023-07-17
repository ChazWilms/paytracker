<!DOCTYPE html>
<html>
<body>

<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href="./style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>

<div id="navBar">
<ul>
  <li><a href="https://xerwai.com">Home</a></li>
  <li><a href="../../locate">Location Tracking</a></li>
  <li><a href="../">Payment Info</a></li>
  <li><a href="#">Account Info</a></li>
  <li><a href="../../help">Help</a></li>
  <li id="right_align"><p>userid</p></li>
</ul>
</div>
<p id="fail_writer"></p>



<!-- Quick finance can show just 3 lines and they are tim euntill next pay and amount with an in progress for the week that is still being counted -->
<!-- prevent sql injections and divs inside divs to create boxes in teh boxes -->
<!-- text color for extended info with green and red -->


<div id="mainContainer">
  <div id="one" class='box_test'><p class="centerme">Quick Finance Information</p></div>
  <div id="two" class="box_test"><p class="centerme">Upcoming Work Days (week)</p><p id="future" class="centerme">Loading...</p></div>
  <div id="three" class="box_test"><p class="centerme">Recent Work Days (week)</p><p id="recent" class="centerme">Loading...</p></div>
  <div id="four" class="box_test"><p class="centerme">Extended Finance Info</p></div>

</div>


<script >
  var id = localStorage.getItem('id');
  console.log(id);



  if (id == null) {
var id = prompt('Please input id');
}
console.log(id);
if (id == null) {
<!-- If USER CLICKES CANCEL IT BREAKS -->
document.getElementById("fail_writer").innerHTML="Please refresh and enter an id";
if (id == null) {
var id = "nullIDEnterd";

}


}
document.getElementById("right_align").innerHTML="User ID: " + id;




</script>






<script>
console.log("RECENT WORK DAYS begin");
<!-- http://www.mustbebuilt.co.uk/jquery-introduction/ajax-getjson-jquery-get-jquery-post-load/ -->
$.getJSON('recentCall.php?id='+id, function(data) {
    document.getElementById("recent").innerHTML= JSON.stringify(data);
if (data != "0 results") {
    var br = "<br>";
    var str1 = ""
    for (var i=0; i < data.length; i++) {
        <!-- console.log("Date: "+data[i].date_info +" Hours: " + data[i].hours + br); -->
        
        str1 = str1.concat("Date: "+data[i].date_info +", Hours: " + data[i].hours + br);
}
    document.getElementById("recent").innerHTML= (str1);

} else if (data == "0 results") {
    document.getElementById("recent").innerHTML= ("No Recent Work Days");

} else {
    document.getElementById("recent").innerHTML= ("Unknown Error");

}
console.log("RECENT WORK DAYS over in");
});
console.log("RECENT WORK DAYS over out");




console.log("FUTURE WORK DAYS begin");
<!-- http://www.mustbebuilt.co.uk/jquery-introduction/ajax-getjson-jquery-get-jquery-post-load/ -->
$.getJSON('futureCall.php?id='+id, function(data) {
    document.getElementById("future").innerHTML= JSON.stringify(data);
if (data != "0 results") {
    console.log("logged data   " + data);
    var br = "<br>";
    var str1 = ""
    for (var i=0; i < data.length; i++) {
        length = parseFloat(data[i].length.split(':')[0]) + parseFloat(data[i].length.split(':')[1])/60;
        console.log(data[i]);

        const date2 = Math.floor(new Date(data[i].date_info).getTime()) + 14400000
        console.log("sql date: " +date2 +   "   " + data[i].date_info)
        var date_choice = "";
        var today = new Date()
        today = today.setHours(0,0,0,0);
        console.log("tdy "+today)
        var tmrw = today + 86400000
        console.log("tmrw "+tmrw)




    if (today ==  date2) {
	console.log("today");
        var date_choice = "TDY";
} else if (tmrw ==  date2) {
	console.log("tmrw");
        var date_choice = "TMRW";


} else {
console.log("none")
console.log(data[i].date_info)
date_choice = data[i].date_info.slice(5)
}



        str1 = str1.concat("Date: " + date_choice + ", Start: " + (data[i].start_time).split(' ')[1] + ", Length: " + length.toPrecision(3)   + " <br>"       );
<!-- str1 = str1.concat(JSON.stringify(data[i])); -->

}
    document.getElementById("future").innerHTML= (str1);

} else if (data == "0 results") {
    document.getElementById("future").innerHTML= ("No Upcoming Work Days");

} else {
document.getElementById("future").innerHTML= ("Unknown Error " + data + " !");
 
}




console.log("FUTURE WORK DAYS over in");
});
console.log("FUTURE WORK DAYS over out");














</script>



</body>
</html>