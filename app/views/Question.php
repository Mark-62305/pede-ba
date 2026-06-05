<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Question 💕</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- jQuery -->
  <script src="<?= base_url(); ?>/public/js/jquery.js"></script>

  <!-- Google Fonts: Playfair Display + Lora -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Lora:ital,wght@0,400;1,400&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; }

    body {
      font-family: 'Lora', serif;
      margin: 0;
      height: 100vh;
      overflow: hidden;
      touch-action: none;
      cursor: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='32' height='32' viewBox='0 0 32 32'%3E%3Ctext y='28' font-size='28'%3E🩷%3C/text%3E%3C/svg%3E") 16 16, auto;
    }

    /* GIF background */
    .bg-gif {
      position: fixed;
      inset: 0;
      background-image: url('https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExOHBndDl0OGticDBzbXI1ZGx4cWkyZ3RyY2dncjI1Z2NpcTA2MjFjZyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/S32fmyFcPDhuEEo4aP/giphy.gif');
      background-size: cover;
      background-position: center;
      z-index: 0;
    }

    /* Soft overlay so text is readable */
    .overlay {
      position: fixed;
      inset: 0;
      background: rgba(255, 200, 220, 0.35);
      backdrop-filter: blur(1px);
      z-index: 1;
    }

    .content {
      position: relative;
      z-index: 2;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    /* Floating hearts */
    .hearts-bg {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 2;
      overflow: hidden;
    }
    .heart-particle {
      position: absolute;
      bottom: -60px;
      font-size: 1.4rem;
      opacity: 0;
      animation: floatUp linear infinite;
    }
    @keyframes floatUp {
      0%   { transform: translateY(0) rotate(-15deg) scale(0.8); opacity: 0; }
      10%  { opacity: 0.8; }
      90%  { opacity: 0.5; }
      100% { transform: translateY(-110vh) rotate(20deg) scale(1.2); opacity: 0; }
    }

    /* Main card */
    .card {
      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(16px);
      border: 2px solid rgba(255, 150, 180, 0.5);
      border-radius: 2rem;
      padding: 2.5rem 3rem;
      text-align: center;
      box-shadow:
        0 8px 32px rgba(255, 100, 150, 0.25),
        0 0 0 1px rgba(255,255,255,0.4) inset;
      max-width: 420px;
      width: 90%;
      animation: cardPop 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }
    @keyframes cardPop {
      from { transform: scale(0.7) translateY(40px); opacity: 0; }
      to   { transform: scale(1) translateY(0); opacity: 1; }
    }

    .card h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.6rem, 5vw, 2.6rem);
      font-weight: 900;
      color: #c0124e;
      text-shadow: 0 2px 8px rgba(220, 50, 100, 0.2);
      line-height: 1.2;
      margin-bottom: 0.5rem;
      animation: fadeUp 0.6s 0.4s both;
    }

    .card .subtext {
      font-family: 'Lora', serif;
      font-style: italic;
      font-size: 1rem;
      color: #e05080;
      margin-bottom: 2rem;
      animation: fadeUp 0.6s 0.55s both;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(16px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .btn-group {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
      animation: fadeUp 0.6s 0.7s both;
    }

    /* YES button */
    .btn-yes {
      position: relative;
      background: linear-gradient(135deg, #ff4f8b, #e8175d);
      color: white;
      border: none;
      padding: 0.8rem 2.4rem;
      font-family: 'Playfair Display', serif;
      font-size: 1.1rem;
      font-weight: 700;
      border-radius: 50px;
      cursor: pointer;
      box-shadow: 0 4px 20px rgba(232, 23, 93, 0.45);
      transition: transform 0.15s, box-shadow 0.15s;
      letter-spacing: 0.05em;
      overflow: hidden;
    }
    .btn-yes::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.25), transparent);
      border-radius: inherit;
    }
    .btn-yes:hover  { transform: scale(1.08); box-shadow: 0 6px 28px rgba(232, 23, 93, 0.6); }
    .btn-yes:active { transform: scale(0.95); }

    /* PASS button — teleports */
    .btn-pass {
      position: fixed;
      background: rgba(255,255,255,0.75);
      color: #c0124e;
      border: 2px solid rgba(255,150,180,0.7);
      padding: 0.8rem 2rem;
      font-family: 'Playfair Display', serif;
      font-size: 1.1rem;
      font-weight: 700;
      border-radius: 50px;
      cursor: pointer;
      box-shadow: 0 2px 12px rgba(200,50,100,0.15);
      letter-spacing: 0.05em;
      transition: box-shadow 0.1s;
      user-select: none;
      z-index: 10;
    }

    /* Win overlay */
    .win-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(255, 180, 210, 0.55);
      backdrop-filter: blur(6px);
      z-index: 20;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
      animation: fadeIn 0.5s ease;
    }
    .win-overlay.active { display: flex; }
    @keyframes fadeIn {
      from { opacity: 0; } to { opacity: 1; }
    }
    .win-card {
      background: rgba(255,255,255,0.75);
      border: 2px solid rgba(255,130,170,0.6);
      border-radius: 2rem;
      padding: 3rem 3.5rem;
      box-shadow: 0 12px 48px rgba(220, 50, 100, 0.3);
      animation: cardPop 0.6s cubic-bezier(0.34,1.56,0.64,1) both;
    }
    .win-card h2 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 6vw, 3.5rem);
      font-weight: 900;
      color: #c0124e;
      margin-bottom: 0.5rem;
    }
    .win-card p {
      font-family: 'Lora', serif;
      font-style: italic;
      color: #e05080;
      font-size: 1.1rem;
    }

    /* Confetti canvas */
    #confetti-canvas {
      position: fixed;
      inset: 0;
      z-index: 19;
      pointer-events: none;
    }
  </style>
</head>
<body>

  <!-- Animated GIF background -->
  <div class="bg-gif"></div>
  <div class="overlay"></div>

  <!-- Floating hearts -->
  <div class="hearts-bg" id="heartsContainer"></div>

  <!-- Main content -->
  <div class="content">
    <div class="card">
      <h1>Will you go on a<br>date with me? 💕</h1>
      <p class="subtext">Just say YES</p>
      <div class="btn-group">
        <button class="btn-yes" id="yesBtn">YES 🩷</button>
      </div>
    </div>
  </div>

  <!-- PASS button lives at the top level so it can roam the full screen -->
  <button class="btn-pass" id="noBtn">No</button>

  <!-- Win overlay -->
  <div class="win-overlay" id="winOverlay">
    <canvas id="confetti-canvas"></canvas>
    <div class="win-card">
      <h2>YAY!! 🥰💕</h2>
      <p>I knew you'd say yes!<br>It's a date! 🌹</p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <script>
    /* ── Floating hearts ── */
    const emojis = ['💕','🩷','❤️','💗','💓','🌸','💖','🫶'];
    const container = document.getElementById('heartsContainer');
    for (let i = 0; i < 22; i++) {
      const el = document.createElement('span');
      el.classList.add('heart-particle');
      el.textContent = emojis[Math.floor(Math.random() * emojis.length)];
      el.style.left = Math.random() * 100 + 'vw';
      el.style.fontSize = (Math.random() * 1.2 + 0.8) + 'rem';
      el.style.animationDuration = (Math.random() * 6 + 6) + 's';
      el.style.animationDelay = (Math.random() * 8) + 's';
      container.appendChild(el);
    }

    /* ── YES button ── */
    $("#yesBtn").on("click", function () {
      $("#winOverlay").addClass("active");
      launchConfetti();
    });

    /* ── PASS button – starts next to YES, then teleports on hover/touch ── */
    (function positionPassBtn() {
      // Wait for layout so we can read the YES button's position
      const yesBtnEl = document.getElementById('yesBtn');
      const rect = yesBtnEl.getBoundingClientRect();
      const btn = $("#noBtn");
      // Place it to the right of the YES button, vertically centered with it
      const passLeft = rect.right + 16;
      const passTop  = rect.top + (rect.height / 2) - (btn.outerHeight() / 2);
      btn.css({ left: passLeft + "px", top: passTop + "px" });
    })();

    $("#noBtn").on("mouseenter mousemove", function () {
      moveRandom($(this));
    });

    $("#noBtn").on("touchstart touchmove", function (e) {
      e.preventDefault();
      moveRandom($(this));
    });

    function moveRandom($btn) {
      const margin = 20;
      const bw = $btn.outerWidth();
      const bh = $btn.outerHeight();
      const maxLeft = $(window).width()  - bw  - margin;
      const maxTop  = $(window).height() - bh  - margin;
      $btn.css({
        left: (margin + Math.random() * maxLeft) + "px",
        top:  (margin + Math.random() * maxTop)  + "px"
      });
    }

    /* ── Simple confetti ── */
    function launchConfetti() {
      const canvas = document.getElementById('confetti-canvas');
      canvas.width  = window.innerWidth;
      canvas.height = window.innerHeight;
      const ctx = canvas.getContext('2d');
      const colors = ['#ff4f8b','#ff88bb','#ffcce0','#e8175d','#fff0f6','#ff69b4'];
      const pieces = Array.from({ length: 140 }, () => ({
        x: Math.random() * canvas.width,
        y: Math.random() * -canvas.height,
        r: Math.random() * 7 + 4,
        d: Math.random() * 120 + 60,
        color: colors[Math.floor(Math.random() * colors.length)],
        tilt: Math.random() * 10 - 10,
        tiltAngle: 0,
        tiltSpeed: Math.random() * 0.07 + 0.05
      }));
      let angle = 0;
      let frame;
      (function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        angle += 0.01;
        pieces.forEach(p => {
          p.tiltAngle += p.tiltSpeed;
          p.y += (Math.cos(angle + p.d) + 2.5);
          p.x += Math.sin(angle) * 1.2;
          p.tilt = Math.sin(p.tiltAngle) * 12;
          ctx.beginPath();
          ctx.lineWidth = p.r;
          ctx.strokeStyle = p.color;
          ctx.moveTo(p.x + p.tilt + p.r / 4, p.y);
          ctx.lineTo(p.x + p.tilt, p.y + p.tilt + p.r / 3);
          ctx.stroke();
          if (p.y > canvas.height + 20) {
            p.y = -20;
            p.x = Math.random() * canvas.width;
          }
        });
        frame = requestAnimationFrame(draw);
      })();
      // Stop after 6s
      setTimeout(() => { cancelAnimationFrame(frame); ctx.clearRect(0,0,canvas.width,canvas.height); }, 6000);
    }
  </script>
</body>
</html>
