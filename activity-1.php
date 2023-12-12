<!-- Header of the page -->
<?php
include("includes/header.php");
require("functions.php");

check_login();
?>

<style>
    section.page_nav ul li a:hover {
        color: #fff;
        transition: all 0.8s ease;
    }

    section.page_nav ul li {
        width: 25%;
        text-align: center;
        transition: all 0.8s ease;
    }

    section.page_nav ul li a {
        color: #000;
        font-size: 23px;
        font-weight: 600;
        transition: all 0.8s ease;
        text-decoration: none;
    }

    section.page_nav {
        margin: 40px 0 0;
    }

    section.page_nav ul {
        background: #f57d11;
        color: #000;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        border-radius: 20px;
    }
</style>
<!-- Body of the page -->
<br><br><br>
<section class="page_nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>
                        <a href="./activities.php">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="./activity-2.php">
                            Life Path
                        </a>
                    </li>
                    <li>
                        <a href="./activity-3.php"> Create Your Story </a>
                    </li>
                    <li>
                        <a href="./suggestionform.php">
                            Have You Say !..
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Drawing Tool</h2>
            </div>
        </div>
    </div>
</section>

<section class="sec_space">
    <div class="drawing_sp">
        <div id="mySidenav" class="sidenav">
            <button href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close</button>
            <div class="inner-sidebar-content">
                <div class="tools">

                    <!-- Three icons for eraser, pencil, and brush -->
                    <button class="tool-icon"  onclick="setCursor('pencil')">
                        <img class="icons" src="./tool/draw.png">
                    </button>
                    <button class="tool-icon eraser" onclick="setCursor('eraser')">
                        <img class="icons" src="./tool/eraser.png">
                    </button>
                    <button class="tool-icon" onclick="setCursor('brush')">
                        <img class="icons" src="./tool/paint-brush.png">
                    </button>
                </div>
                <div class="common-tag">
                    <strong onclick="toggleColorPalette()">Theme Colors</strong>
                    <div class="colors">

                        
                        <button type="checkbox" value="#0000ff"></button>
                        <button type="button" value="#009fff"></button>
                        <button type="button" value="#0fffff"></button>
                        <button type="button" value="#bfffff"></button>
                        <button type="button" value="#000000"></button>
                        <button type="button" value="#333333"></button>
                        <button type="button" value="#666666"></button>
                        <button type="button" value="#999999"></button>
                        <button type="button" value="#ffcc66"></button>
                        <button type="button" value="#ffcc00"></button>
                        <button type="button" value="#ffff00"></button>
                        <button type="button" value="#ffff99"></button>
                        <button type="button" value="#003300"></button>
                        <button type="button" value="#555000"></button>
                        <button type="button" value="#00ff00"></button>
                        <button type="button" value="#99ff99"></button>
                        <button type="button" value="#f00000"></button>
                        <button type="button" value="#ff6600"></button>
                        <button type="button" value="#ff9933"></button>
                        <button type="button" value="#f5deb3"></button>
                        <button type="button" value="#330000"></button>
                        <button type="button" value="#663300"></button>
                        <button type="button" value="#cc6600"></button>
                        <button type="button" value="#deb887"></button>
                        <button type="button" value="#aa0fff"></button>
                        <button type="button" value="#cc66cc"></button>
                        <button type="button" value="#ff66ff"></button>
                        <button type="button" value="#ff99ff"></button>
                        <button type="button" value="#e8c4e8"></button>
                        <button type="button" value="#ffffff"></button>
                    </div>
                </div>
                <div class="common-tag">
                    <strong onclick="toggleBrushPalette()">Brush Stroke</strong>
                    <div class="brushes">
                        <button type="button" value="1"></button>
                        <button type="button" value="2"></button>
                        <button type="button" value="3"></button>
                        <button type="button" value="4"></button>
                        <button type="button" value="5"></button>
                        <button type="button" value="8"></button>
                        <button type="button" value="12"></button>
                    </div>
                </div>
                <div class="common-tag">
                    <button class="eraser-button">Eraser</button>
                    <input type="range" id="brush-size" min="1" max="60" value="50">
                </div>
                <div class="common-tag">
                    <button class="save-button closebtn">Save</button>
                    <button class="undo-button closebtn">Undo</button>
                    <button class="redo-button closebtn">Redo</button>
                    <button class="clear-button closebtn">Clear</button>
                </div>
            </div>
        </div>
        <div id="navbar2" onclick="closeNav()">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
        </div>
        <div id="navbar">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span> <!-- Hamburger menu icon -->
        </div>

        <div class="right-block">
            <canvas id="paint-canvas" margin:30px; width="1610" height="750">
            </canvas>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        // Get the canvas element and its 2D context 
        var canvas = document.getElementById("paint-canvas");
        var ctx = canvas.getContext("2d");

        // Set the default color and size
        var currentColor = "#0000ff";
        var currentSize = 5;
        var eraserSize = 60; // Set the default eraser stroke width

        // Function to handle click on color buttons
        $(".colors button").click(function() {
            currentColor = $(this).val();
        });

        // Function to handle click on eraser button
        $(".eraser-button").click(function() {
            currentColor = "#ffffff"; // Set the color to white (eraser color)
            canvas.classList.add("eraser-cursor"); // Add the eraser cursor class
            canvas.classList.remove("pencil-cursor"); // Remove pencil cursor class (if it was added)
            canvas.classList.remove("brush-cursor"); // Remove brush cursor class (if it was added)
        });

        // Function to handle click on eraser button
        $(".eraser").click(function() {
            currentColor = "#ffffff"; // Set the color to white (eraser color)
        });

        // Function to draw on the canvas when the mouse is down and moving
        var isDrawing = false;
        $(canvas).on("mousedown mousemove touchstart touchmove", function(e) {
            if (e.type === "mousedown" || e.type === "touchstart") {
                isDrawing = true;
                ctx.beginPath();
                var x, y;
                if (e.type === "mousedown") {
                    x = e.offsetX;
                    y = e.offsetY;
                } else if (e.type === "touchstart") {
                    x = e.originalEvent.touches[0].pageX - $(this).offset().left;
                    y = e.originalEvent.touches[0].pageY - $(this).offset().top;
                }
                ctx.moveTo(x, y);
                if (currentColor === "#ffffff") {
                    // Set to erase mode
                    ctx.globalCompositeOperation = "destination-out";
                    ctx.lineWidth = eraserSize; // Use the eraserSize as the stroke width
                    ctx.lineCap = "round";
                    ctx.lineJoin = "round";
                    ctx.arc(e.offsetX, e.offsetY, eraserSize / 2, 0, Math.PI * 2);
                    ctx.fill();
                } else {
                    // Set to drawing mode
                    ctx.globalCompositeOperation = "source-over";
                    ctx.lineWidth = currentSize; // Use the currentSize as the stroke width
                    ctx.lineCap = "round";
                    ctx.lineJoin = "round";
                }
            } else if ((e.type === "mousemove" || e.type === "touchmove") && isDrawing) {
                var x, y;
                if (e.type === "mousemove") {
                    x = e.offsetX;
                    y = e.offsetY;
                } else if (e.type === "touchmove") {
                    x = e.originalEvent.touches[0].pageX - $(this).offset().left;
                    y = e.originalEvent.touches[0].pageY - $(this).offset().top;
                }
                ctx.lineTo(x, y);
                ctx.strokeStyle = currentColor;
                ctx.stroke();
            }

        });

        // Function to stop drawing when the mouse is up or leaves the canvas
        $(canvas).on("mouseup mouseleave touchend touchcancel", function(e) {
            if (isDrawing) {
                isDrawing = false;
                saveState();
            }
        });

        // Disable default touch event behavior for scrolling on the canvas element
        $("#paint-canvas").on("touchmove", function(e) {
            e.preventDefault();
        });

        // Function to change the size of the brush/eraser
        $(".brushes button").click(function() {
            currentSize = $(this).val();
            $(".brushes button").removeClass("active");
            $(this).addClass("active");
        });


        // Function to save the current canvas state
        var undoStack = [];
        var redoStack = [];

        function saveState() {
            redoStack = []; // Clear redo stack whenever a new drawing action is performed
            undoStack.push(canvas.toDataURL());
        }

        // Function to clear the canvas
        function clearCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            saveState();
        }

        // Function to undo the last drawing action
        function undo() {
            if (undoStack.length > 1) {
                redoStack.push(undoStack.pop());
                var img = new Image();
                img.onload = function() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    ctx.drawImage(img, 0, 0);
                };
                img.src = undoStack[undoStack.length - 1];
            }
        }

        // Function to redo the undone action
        function redo() {
            if (redoStack.length > 0) {
                undoStack.push(redoStack.pop());
                var img = new Image();
                img.onload = function() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    ctx.drawImage(img, 0, 0);
                };
                img.src = undoStack[undoStack.length - 1];
            }
        }

        // Attach click event to the save button
        $(".save-button").click(function() {
            var link = document.createElement("a");
            link.download = "canvas_image.png";
            link.href = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            link.click();
        });

        // Attach click event to the undo button
        $(".undo-button").click(function() {
            undo();
        });

        // Attach click event to the redo button
        $(".redo-button").click(function() {
            redo();
        });

        // Attach click event to the clear button
        $(".clear-button").click(function() {
            clearCanvas();
        });
    });
</script>
<!-- Footer of the page -->
<?php
include("includes/footer.php");
?>