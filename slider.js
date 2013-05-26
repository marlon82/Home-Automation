

$("#slider-1").on("slidestop", function( event, ui ) { 
var singleValues = $("#slider-1").val();
var link = "&action=setAktor&id=1&value=";
var test = "index.php?page=room&room=1" + link + singleValues;
window.location= "index.php?page=room&room=1" + link + singleValues;
});

$("#slider-2").on("slidestop", function( event, ui ) { 
var singleValues = $("#slider-2").val();
var link = "&action=setAktor&id=2&value=";
var test = "index.php?page=room&room=1" + link + singleValues;
window.location= "index.php?page=room&room=1" + link + singleValues;
});
