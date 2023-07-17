<!DOCTYPE html>
<html>
    <head>
        <title>
            Create a Form Dynamically with
            the JavaScript
        </title>
    </head>
    <body style="text-align: center;">
         <p>
          Click here to add new date for work, dont add to many becuase they cant be removed.
        </p>
        <button onClick="GFG_Fun2()">
            click here
        </button>




        <p id="GFG_DOWN">12 PM IS NOON</p>


<form id="form_uuid" method="post" action="./record_multi.php">
  <input type="submit" value="Submit"> <br>



<!--   add reomve line and when sumitted if one of the options in blnak (date) pass over it and after submit show a table of submitted values        -->

</form>







 <script>
    var down = document.getElementById("GFG_DOWN");
           
    // Create a break line element
    var br = document.createElement("br");
    function GFG_Fun2() {
     var form = document.getElementById("form_uuid");
    var date1 = document.createElement("input");
    date1.setAttribute("type", "date");
    date1.setAttribute("name", "date[]");

    date1.setAttribute("autocomplete", "off");

    date1.setAttribute("type", "date");
    
    var time1 = document.createElement("input");
    time1.setAttribute("type", "time");
    time1.setAttribute("id", "appt");
    time1.setAttribute("name", "appt[]");
    time1.setAttribute("value", "12:00");

    var time2 = document.createElement("input");
    time2.setAttribute("type", "time");
    time2.setAttribute("id", "appt");
    time2.setAttribute("name", "appt2[]");
    time2.setAttribute("value", "17:00");

















    form.appendChild(date1);
    form.appendChild(time1);

    form.appendChild(time2);



     form.appendChild(br.cloneNode());

}

        </script>
    </body>
</html>