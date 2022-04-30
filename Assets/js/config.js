var corAtiva = "#ffc107";
var corInativa = "#e0e0e0";

var i = 0
function move() {
  if (i == 0) {
    i = 1
    var elem = document.getElementById("myBar")
    var width = 1
    var id = setInterval(frame, 305)
    function frame() {
      if (width >= 100) {
        clearInterval(id)
        i = 0
        document.location.reload(true)
      } else {
        width++
        elem.style.width = width + "%"
      }
    }
  }
}
move()

function selectRadio(v){
    for (let index = 1; index < 5; index++){
        document.querySelector("#r" + index).style.backgroundColor = corInativa
    }
    document.querySelector("#rad" + v).checked = true
}

function hover(v){
    document.querySelector("#r" + v).style.backgroundColor = corAtiva
}

function leave(v){
    if(!document.querySelector("#rad" + v).checked){
        document.querySelector("#r" + v).style.backgroundColor = corInativa
    }
    
}