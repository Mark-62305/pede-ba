
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Activity Tasks - jQuery Events (Cabatay)</title>

  <!-- Replace this with your real jQuery file if PHP works.
       Otherwise, use CDN for sanity check. -->
  <script src="<?= base_url(); ?>/public/js/jquery.js"></script>

  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: radial-gradient(circle at top left, #0f172a, #1e293b, #111827);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      color: #e5e7eb;
      overflow: hidden;
    }

    .container {
      position: relative;
      background: #1e293b;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
      width: 420px;
      text-align: center;
      transition: 0.3s;
      overflow: hidden;
    }

    h2 {
      margin-bottom: 20px;
      color: #facc15;
      letter-spacing: 0.5px;
    }

    button {
      background: #3b82f6;
      color: white;
      border: none;
      padding: 10px 16px;
      border-radius: 8px;
      cursor: pointer;
      margin-top: 10px;
      transition: background 0.2s, transform 0.1s;
      font-weight: 500;
    }

    button:hover {
      background: #2563eb;
    }

    #multiEventBtn {
      background: #10b981;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }

    #multiEventBtn:hover {
      background: #059669;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2 id="box">123456789</h2>

    <button id="bttoggle">Toggle</button><br>
    <button id="bthide">Hide</button><br>
    <button id="btshow">Show</button><br>
    <button id="btslide">Slide</button><br>
    <button id="multiEventBtn">Animate</button><br>
  </div>

  <script>
    $(document).ready(function() {

      // Hide
      $("#bthide").click(function() {
        $("#box").hide(400);
      });

      // Show
      $("#btshow").click(function() {
        $("#box").show(400);
      });

      // Toggle
      $("#bttoggle").click(function() {
        $("#box").toggle(400);
      });

      // Slide Toggle
      $("#btslide").click(function() {
        $("#box").slideToggle(400);
      });

      // Animate button behavior — instant dodge mode
      $("#multiEventBtn").on("mouseenter mousemove", function() {
        moveRandom($(this));
      });

      function moveRandom($btn) {
        var $container = $(".container");
        var maxLeft = $container.width() - $btn.outerWidth();
        var maxTop = $container.height() - $btn.outerHeight();
        var newLeft = Math.random() * maxLeft;
        var newTop = Math.random() * maxTop;

        $btn.stop(true).animate({
          left: newLeft + "px",
          top: newTop + "px"
        }, 50); // fast enough to dodge your mouse
      }



    });
  </script>

</body>
</html>
