function buscar()
{
var xmlhttp;

var n=document.getElementById('busca').value;
var nada="No se encontro resultados.<br><a href=tutorados.php?id_prof=$id_prof><input id='botontutorado' type='button' name='consultar' value='Recargar'></a>";

if(n==''){
document.getElementById("tutorados").innerHTML=nada;
return; 
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("tutorados").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("POST","proc.php?id_prof=$id_prof",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+n);
}
