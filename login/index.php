




<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=240,user-scalable=no" />

<style>
body {
  background-color: gray;
}

h1 {
  color: maroon;
  margin-left: 40px;
}
div, form, label, input, h2 {
  margin: auto;
  padding: 10px;
}


</style>
</head>

<body>

<p id="redirect_reason"></p>
<h2>Paytracking Login</h2>


<div>

<form action="./action_page.php" method="post">
  <input type="text" id="username" name="username" placeholder="Username"><br>
  <input type="password" id="password" name="password" placeholder="Password"><br><br>
  <input type="submit" value="Submit">
</form> 
</div>

<script>
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
console.log(urlParams.has('reason'));
if (urlParams.has('reason') == true) {

if (urlParams.get('reason') == "1") {

document.getElementById("redirect_reason").innerHTML = 'Attempted to view info page without logging in. <br>Please login';

}

console.log("tset sucessuf");


}

</script>

</body>
</html>

