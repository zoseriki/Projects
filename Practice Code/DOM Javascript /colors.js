"use strict";
window.onload=pageLoad;

 function pageLoad(){
  document.getElementById("verify_button").onclick=display_verify_message;
 }

//the onclick event handler
function display_verify_message(){
  document.getElementById("red").onclick=colors;
  document.getElementById("blue").onclick=colors;
  document.getElementById("green").onclick=colors;
  document.getElementById("yellow").onclick=colors;
  document.getElementById("orange").onclick=colors;

}

function colors() {
  var selected;

  var all = document.getElementsByName("colorButton");
  var i;
  for(i = 0; i < all.length; i++) {
    if (all[i].checked) {
      selected = all[i].value;
    }
  }
}
alert(selected);