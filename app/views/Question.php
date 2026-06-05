<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Will You Go On A Date With Me? 💕</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- jQuery (CodeIgniter base_url for project) -->
  <script src="<?= base_url(); ?>/public/js/jquery.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --rose-900: #881337;
      --rose-700: #be185d;
      --rose-500: #f43f5e;
      --rose-400: #fb7185;
      --rose-300: #fda4af;
      --rose-100: #ffe4e6;
      --rose-50:  #fff1f2;
    }

    html, body {
      height: 100%;
    }

    body {
      font-family: 'Cormorant Garamond', Georgia, serif;
      overflow: hidden;
      touch-action: none;
      background: #fce7f3;
    }

    /* ── GIF background ── */
    .bg-gif {
      position: fixed;
      inset: 0;
      background-image: url('https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExOHBndDl0OGticDBzbXI1ZGx4cWkyZ3RyY2dncjI1Z2NpcTA2MjFjZyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/S32fmyFcPDhuEEo4aP/giphy.gif');
      background-size: cover;
      background-position: center;
      z-index: 0;
    }
    /* Light pink wash over the gif — matches the Lovable reference tone */
    .bg-overlay {
      position: fixed;
      inset: 0;
      background: rgba(252, 231, 243, 0.62);
      z-index: 1;
    }

    /* ── Floating petals (🌸 💗) ── */
    .petals {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 2;
      overflow: hidden;
    }
    .petal {
      position: absolute;
      opacity: 0;
      animation: drift linear infinite;
    }
    @keyframes drift {
      0%   { transform: translateY(-40px) rotate(0deg);   opacity: 0; }
      8%   { opacity: 0.45; }
      92%  { opacity: 0.25; }
      100% { transform: translateY(110vh) rotate(360deg); opacity: 0; }
    }

    /* ── Main layout ── */
    .page {
      position: relative;
      z-index: 3;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 2rem 1.5rem;
      text-align: center;
    }

    /* ── Heading ── */
    h1 {
      font-size: clamp(2.6rem, 9vw, 5.5rem);
      font-weight: 600;
      color: var(--rose-900);
      line-height: 1.18;
      letter-spacing: -0.01em;
      opacity: 0;
      animation: fadeUp 0.8s 0.2s cubic-bezier(0.22,1,0.36,1) forwards;
    }

    /* ── Subtext ── */
    .subtext {
      margin-top: 1.2rem;
      font-size: clamp(1rem, 3vw, 1.35rem);
      font-style: italic;
      color: rgba(190, 24, 93, 0.7);
      opacity: 0;
      animation: fadeUp 0.8s 0.45s cubic-bezier(0.22,1,0.36,1) forwards;
    }

    /* ── Button group ── */
    .btn-group {
      margin-top: 3rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.9rem;
      opacity: 0;
      animation: fadeUp 0.8s 0.65s cubic-bezier(0.22,1,0.36,1) forwards;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(22px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── YES button ── */
    .btn-yes {
      position: relative;
      width: 220px;
      padding: 1rem 0;
      border: none;
      border-radius: 9999px;
      background: linear-gradient(135deg, var(--rose-400), var(--rose-500));
      color: #fff;
      font-family: inherit;
      font-size: 1.25rem;
      font-weight: 600;
      letter-spacing: 0.02em;
      cursor: pointer;
      box-shadow: 0 6px 24px rgba(244, 63, 94, 0.38), 0 2px 8px rgba(244, 63, 94, 0.2);
      transition: transform 0.18s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.18s ease;
      overflow: hidden;
    }
    .btn-yes::after {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      background: linear-gradient(160deg, rgba(255,255,255,0.22) 0%, transparent 55%);
    }
    .btn-yes:hover  { transform: scale(1.07); box-shadow: 0 8px 32px rgba(244,63,94,0.5); }
    .btn-yes:active { transform: scale(0.96); }

    /* ── Invisible placeholder that holds the No button's space ── */
    .no-placeholder {
      width: 220px;
      height: 52px;   /* synced by JS after render */
      border-radius: 9999px;
      visibility: hidden;
      pointer-events: none;
      flex-shrink: 0;
    }

    /* ── No button — fixed so it can roam the whole screen ── */
    .btn-no {
      position: fixed;
      width: 220px;
      padding: 1rem 0;
      border-radius: 9999px;
      border: 1.5px solid var(--rose-300);
      background: rgba(255,255,255,0.82);
      color: var(--rose-500);
      font-family: inherit;
      font-size: 1.25rem;
      font-weight: 600;
      letter-spacing: 0.02em;
      cursor: pointer;
      box-shadow: 0 2px 12px rgba(244,63,94,0.1);
      user-select: none;
      z-index: 10;
      text-align: center;
      transition: background 0.1s;
      backdrop-filter: blur(4px);
    }
    .btn-no:hover { background: rgba(255,255,255,0.95); }

    /* ── Win overlay ── */
    .win-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(252, 231, 243, 0.72);
      backdrop-filter: blur(8px);
      z-index: 30;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .win-overlay.active { display: flex; }

    .win-inner {
      animation: popIn 0.55s cubic-bezier(0.34,1.56,0.64,1) both;
    }
    @keyframes popIn {
      from { transform: scale(0.6) translateY(30px); opacity: 0; }
      to   { transform: scale(1) translateY(0);      opacity: 1; }
    }
    .win-inner h2 {
      font-size: clamp(2.5rem, 10vw, 5rem);
      font-weight: 600;
      color: var(--rose-900);
      line-height: 1.15;
    }
    .win-inner p {
      margin-top: 0.8rem;
      font-size: clamp(1rem, 3.5vw, 1.4rem);
      font-style: italic;
      color: rgba(190,24,93,0.75);
    }

    /* ── Confetti canvas ── */
    #confetti-canvas {
      position: fixed;
      inset: 0;
      z-index: 29;
      pointer-events: none;
    }
  </style>
</head>
<body>

  <!-- GIF background + pink wash -->
  <div class="bg-gif"></div>
  <div class="bg-overlay"></div>

  <!-- Floating petals -->
  <div class="petals" id="petalsContainer"></div>

  <!-- Page -->
  <div class="page">
    <h1>Will you go on a<br>date with me?</h1>
    <p class="subtext">just say yes 💌</p>

    <div class="btn-group">
      <button class="btn-yes" id="yesBtn">Yes 💖</button>
      <!-- Invisible spacer — keeps layout height for the No button -->
      <div class="no-placeholder" id="noPlaceholder"></div>
    </div>
  </div>

  <!-- No button — body-level so it roams the full screen -->
  <button class="btn-no" id="noBtn">No</button>

  <!-- Win screen -->
  <div class="win-overlay" id="winOverlay">
    <canvas id="confetti-canvas"></canvas>
    <div class="win-inner">
      <h2>Yay!! 🥰💕</h2>
      <p>I knew you'd say yes!<br>It's a date! 🌹</p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <script>
    /* ── Floating petals ── */
    const petalEmojis = ['🌸','🌸','💗','🌸','💗','🌸'];
    const petalsEl = document.getElementById('petalsContainer');
    for (let i = 0; i < 20; i++) {
      const p = document.createElement('span');
      p.className = 'petal';
      p.textContent = petalEmojis[Math.floor(Math.random() * petalEmojis.length)];
      p.style.left        = (Math.random() * 100) + 'vw';
      p.style.top         = '-40px';
      p.style.fontSize    = (Math.random() * 18 + 12) + 'px';
      p.style.animationDuration = (Math.random() * 8 + 7) + 's';
      p.style.animationDelay   = (Math.random() * 10) + 's';
      petalsEl.appendChild(p);
    }

    /* ── Position No button over its placeholder on load ── */
    (function init() {
      const ph  = document.getElementById('noPlaceholder');
      const btn = document.getElementById('noBtn');
      // Let browser paint first so getBoundingClientRect is accurate
      requestAnimationFrame(() => {
        const r = ph.getBoundingClientRect();
        btn.style.left = r.left + 'px';
        btn.style.top  = r.top  + 'px';
        // Match placeholder height to actual button height
        ph.style.height = btn.offsetHeight + 'px';
      });
    })();

    /* ── YES ── */
    $('#yesBtn').on('click', function () {
      $('#winOverlay').addClass('active');
      launchConfetti();
    });

    /* ── No: teleports away on hover / touch ── */
    $('#noBtn').on('mouseenter mousemove', function () {
      moveRandom($(this));
    });
    $('#noBtn').on('touchstart touchmove', function (e) {
      e.preventDefault();
      moveRandom($(this));
    });

    function moveRandom($btn) {
      const pad = 16;
      const bw  = $btn.outerWidth();
      const bh  = $btn.outerHeight();
      const maxL = $(window).width()  - bw  - pad;
      const maxT = $(window).height() - bh  - pad;
      $btn.css({
        left: (pad + Math.random() * maxL) + 'px',
        top:  (pad + Math.random() * maxT) + 'px'
      });
    }

    /* ── Confetti ── */
    function launchConfetti() {
      const canvas = document.getElementById('confetti-canvas');
      canvas.width  = window.innerWidth;
      canvas.height = window.innerHeight;
      const ctx = canvas.getContext('2d');
      const colors = ['#fb7185','#f43f5e','#fda4af','#fce7f3','#be185d','#ff9fb0'];
      const pieces = Array.from({ length: 150 }, () => ({
        x: Math.random() * canvas.width,
        y: Math.random() * -canvas.height,
        r: Math.random() * 7 + 3,
        d: Math.random() * 120 + 40,
        color: colors[Math.floor(Math.random() * colors.length)],
        tilt: 0, tiltAngle: 0,
        tiltSpeed: Math.random() * 0.07 + 0.04
      }));
      let angle = 0, frame;
      (function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        angle += 0.01;
        pieces.forEach(p => {
          p.tiltAngle += p.tiltSpeed;
          p.y += Math.cos(angle + p.d) + 2.8;
          p.x += Math.sin(angle) * 1.4;
          p.tilt = Math.sin(p.tiltAngle) * 14;
          ctx.beginPath();
          ctx.lineWidth   = p.r;
          ctx.strokeStyle = p.color;
          ctx.moveTo(p.x + p.tilt + p.r / 4, p.y);
          ctx.lineTo(p.x + p.tilt, p.y + p.tilt + p.r / 3);
          ctx.stroke();
          if (p.y > canvas.height + 20) { p.y = -20; p.x = Math.random() * canvas.width; }
        });
        frame = requestAnimationFrame(draw);
      })();
      setTimeout(() => { cancelAnimationFrame(frame); ctx.clearRect(0,0,canvas.width,canvas.height); }, 6500);
    }
  </script>
</body>
</html>
