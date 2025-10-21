<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Question</title>
  <script src="<?= base_url(); ?>/public/js/jquery.js"></script>
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      font-family: "Courier New", monospace;
      background: white;
      overflow: hidden;
      touch-action: none;
    }

    h1 {
      font-size: 50px;
      margin-bottom: 40px;
    }

    button {
      position: absolute;
      font-family: "Courier New", monospace;
      padding: 10px 40px;
      border: 2px solid black;
      background: white;
      font-weight: bold;
      cursor: pointer;
      user-select: none;
    }

    #yesBtn {
      left: 40%;
      top: 60%;
    }

    #noBtn {
      left: 55%;
      top: 60%;
    }
  </style>
</head>
<body>
  <h1>PEDE BANG MAGING TAYO?</h1>
  <button id="yesBtn">yes</button>
  <button id="noBtn">no</button>

  <script>
    $("#yesBtn").click(function() {
      alert("HAHAHA LOVE YOU");
    });

    // The NO button instantly teleports on hover or near-hover
    $("#noBtn").on("mouseenter mousemove", function() {
      moveRandom($(this));
    });

    $("#noBtn").on("touchstart touchmove", function(e) {
      e.preventDefault(); // stop accidental click or scroll
      moveRandom($(this));
    });

    function moveRandom($btn) {
      const bodyWidth = $(window).width() - $btn.outerWidth();
      const bodyHeight = $(window).height() - $btn.outerHeight();

      const newLeft = Math.random() * bodyWidth;
      const newTop = Math.random() * bodyHeight;

      // instantly move — no animation delay
      $btn.css({
        left: newLeft + "px",
        top: newTop + "px"
      });
    }
  </script>
</body>
</html>
