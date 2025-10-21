<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Question</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- jQuery -->
  <script src="<?= base_url(); ?>/public/js/jquery.js"></script>
</head>
<body class="h-screen flex flex-col justify-center items-center text-center bg-gradient-to-br from-pink-100 via-rose-200 to-pink-300 font-mono overflow-hidden touch-none relative">

  <h1 class="text-3xl sm:text-5xl font-bold text-gray-800 mb-16 drop-shadow-md select-none">
    PEDE BANG MAGING TAYO?
  </h1>

  <button id="yesBtn"
    class="absolute left-[20%] top-[60%] bg-white border-2 border-gray-800 px-8 py-3 font-bold text-lg rounded-xl shadow-md hover:bg-green-200 active:scale-95 transition">
    yes
  </button><br><br><br><br>

  <button id="noBtn"
    class="absolute left-[65%] top-[60%] bg-white border-2 border-gray-800 px-8 py-3 font-bold text-lg rounded-xl shadow-md cursor-pointer select-none">
    no
  </button>

  <script>
    $("#yesBtn").click(function() {
      alert("HAHAHA LOVE YOU ❤️");
    });

    // The NO button teleports on hover or near-hover
    $("#noBtn").on("mouseenter mousemove", function() {
      moveRandom($(this));
    });

    $("#noBtn").on("touchstart touchmove", function(e) {
      e.preventDefault();
      moveRandom($(this));
    });

    function moveRandom($btn) {
      const bodyWidth = $(window).width() - $btn.outerWidth();
      const bodyHeight = $(window).height() - $btn.outerHeight();

      const newLeft = Math.random() * bodyWidth;
      const newTop = Math.random() * bodyHeight;

      $btn.css({
        left: newLeft + "px",
        top: newTop + "px"
      });
    }
  </script>

</body>
</html>
