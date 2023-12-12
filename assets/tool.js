
function openNav() {
document.getElementById("mySidenav").style.left = "0px";

document.getElementById("navbar").style.display = "none";

document.getElementById("navbar2").style.display = "block";

}

function closeNav() {
document.getElementById("mySidenav").style.left = "-270px";

document.getElementById("navbar").style.display = "block";

document.getElementById("navbar2").style.display = "none";
}



var $affectedElements = $("li, a, p, h1, h2, h3, h4, h5, h6, span"); // Can be extended, ex. $("div, p, span.someClass")

// Storing the original size in a data attribute so size can be reset
$affectedElements.each( function(){
var $this = $(this);
$this.data("orig-size", $this.css("font-size") );
});

$("#btn-increase").click(function(){
changeFontSize(1);
})

$("#btn-decrease").click(function(){
changeFontSize(-1);
})

$("#btn-orig").click(function(){
$affectedElements.each( function(){
      var $this = $(this);
      $this.css( "font-size" , $this.data("orig-size") );
 });
})

function changeFontSize(direction){
  $affectedElements.each( function(){
      var $this = $(this);
      $this.css( "font-size" , parseInt($this.css("font-size"))+direction );
  });
}




// Toggle with hitting of ESC
$(document).keyup(function(e) {
if (e.keyCode == 27) {
 $('body').toggleClass('show-nav');
}
});

function toggleColorPalette() {
  var colorPalette = document.querySelector(".colors");
  colorPalette.classList.toggle("show");
}

function toggleBrushPalette() {
  var colorPalette = document.querySelector(".brushes");
  colorPalette.classList.toggle("show");
}
function setCursor(tool) {
  var canvas = document.getElementById("paint-canvas");
  var svgCursor = '';

  switch (tool) {
      case 'eraser':
          // Replace 'path/to-eraser-cursor.svg' with the path to your eraser cursor SVG file
          svgCursor = 'url("./tool/eraser.png"), auto';
          break;
      case 'pencil':
          // Replace 'path/to-pencil-cursor.svg' with the path to your pencil cursor SVG file
          svgCursor = 'url("./tool/draw.png"), auto';
          break;
      case 'brush':
          // Replace 'path/to-brush-cursor.svg' with the path to your brush cursor SVG file
          svgCursor = 'url("./tool/paint-brush.png"), auto';
          break;
      default:
          svgCursor = 'default';
          break;
  }

  canvas.style.cursor = svgCursor;
}
