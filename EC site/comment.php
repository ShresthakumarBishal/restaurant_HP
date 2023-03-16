<!DOCTYPE html>
<html>
<body>

<button onclick="like()">LIKE <span id="like"></span></button> 
<h2>Use the HTTP method POST to send data to the PHP file.</h2>

<p id="demo"></p>

<script>
function llike(value){
var obj, dbParam, xmlhttp, myObj, x, txt = "";
myObj = value;
obj = { product_id:2, liked: myObj };
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {

    document.getElementById("demo").innerHTML = this.responseText;
  }
};
xmlhttp.open("POST", "sending.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);
}
llike();
function like(){
llike('yes');
}
</script>

<p>Try changing the "limit" property from 10 to 5.</p>

</body>
</html>