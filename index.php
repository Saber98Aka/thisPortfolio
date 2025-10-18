<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sossé Alaoui Hajar — Portfolio (V2 animé)</title>

  <!-- Bootstrap (visual helper only) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonts + Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Montserrat:wght@600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root{
      --bg1: #0f0216;
      --bg2: #2e0b4c;
      --accent: #8b32ff;
      --accent-2: #d7b8ff;
      --card: rgba(255,255,255,0.04);
      --glass: rgba(255,255,255,0.06);
      --text: #f6f5fb;
      --muted: rgba(255,255,255,0.72);
      --shadow: 0 12px 40px rgba(0,0,0,0.6);
    }

    /* Page background: subtle radial lights + slow rotation */
    html,body{height:100%}
    body{
      margin:0;
      font-family:"Inter",system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial;
      color:var(--text);
      background: radial-gradient(900px 400px at 10% 10%, rgba(139,50,255,0.12), transparent),
                  radial-gradient(700px 300px at 90% 80%, rgba(45,12,86,0.08), transparent),
                  linear-gradient(180deg,var(--bg2) 0%, var(--bg1) 100%);
      overflow-x:hidden;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      position:relative;
    }

    /* rotating decorative layer */
    body::after{
      content:"";
      position:fixed; inset:-25%;
      background: conic-gradient(from 200deg at 50% 50%, rgba(139,50,255,0.06), rgba(0,0,0,0.02) 40%, rgba(215,184,255,0.03));
      transform:rotate(0deg);
      z-index:0;
      animation:spin 40s linear infinite;
      pointer-events:none;
      mix-blend-mode:overlay;
    }
    @keyframes spin{to{transform:rotate(360deg)}}

    /* layout card */
    .site-wrap{position:relative; z-index:2; display:flex; justify-content:center; padding:"20px" ;}
    .main-card{
      width:100%; max-width:1100px;
      background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      border-radius:16px; overflow:hidden; box-shadow:var(--shadow);
      border:1px solid rgba(255,255,255,0.04);
      backdrop-filter: blur(6px);
    }

    /* topbar */
    .topbar{display:flex;align-items:center;justify-content:space-between;padding:18px 26px;background:linear-gradient(90deg, rgba(139,50,255,0.06), rgba(0,0,0,0.02)); border-bottom:1px solid rgba(255,255,255,0.03)}
    .brand{display:flex;gap:12px;align-items:center;font-family:"Montserrat",sans-serif;font-weight:800}
    .dot{width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,var(--accent),#a95bff);display:flex;align-items:center;justify-content:center;font-weight:800;color:#fff;box-shadow:0 6px 18px rgba(139,50,255,0.25)}
    .nav-links a{color:var(--muted);margin-right:18px;text-decoration:none;font-weight:700;transition:color .22s}
    .nav-links a:hover{color:var(--accent-2); transform:translateY(-2px)}

    /* hero */
    .hero{display:flex;gap:28px;padding:44px 40px;align-items:center}
    .hero-left{flex:1}
    .hi{color:var(--accent-2); font-weight:800}
    .title{font-family:"Montserrat"; font-size:34px; margin-top:6px; color: #fff}
    .subtitle{color:var(--muted); margin-top:10px; max-width:62ch; line-height:1.5}
    .hero-actions{margin-top:18px;display:flex;gap:12px}
    .btn-accent{
      display:inline-flex; align-items:center; gap:10px;
      background:linear-gradient(90deg,var(--accent), #b57bff);
      color:#fff; padding:11px 18px; border-radius:10px; border:none; font-weight:800;
      box-shadow:0 8px 30px rgba(139,50,255,0.18);
      transition:all .28s ease;
    }
    .btn-accent:hover{transform:translateY(-3px); filter:brightness(1.02); box-shadow:0 18px 60px rgba(139,50,255,0.28)}
    .btn-outline{padding:10px 16px; border-radius:10px; border:1px solid rgba(255,255,255,0.08); color:var(--text); background:transparent; font-weight:700}

    .hero-right{width:340px;flex-shrink:0; text-align:center}
    .profile-photo{
      width:100%; border-radius:50px ; border:1px solid rgba(255,255,255,0.06);
      box-shadow:0 12px 30px rgba(0,0,0,0.6); display:inline-block;
      transition:transform .45s cubic-bezier(.2,.9,.3,1);

    }
    .profile-photo:hover{transform:translateY(-6px) scale(1.01)}

    /* about + skills */
    .about-skills{display:flex;gap:26px;padding:28px 40px;border-top:1px dashed rgba(255,255,255,0.03);flex-wrap:wrap}
    .about{flex:1; min-width:280px}
    .about h4{color:var(--accent-2); font-weight:800}
    .about p, .about li{color:var(--muted); line-height:1.6}
    .skills{width:320px; padding:18px; border-radius:12px; background:linear-gradient(180deg, rgba(139,50,255,0.04), rgba(0,0,0,0.02)); border:1px solid rgba(255,255,255,0.03)}
    .skill-chip{display:inline-flex; gap:8px; align-items:center;background:rgba(255,255,255,0.04); padding:8px 10px; border-radius:999px; margin:6px; font-weight:700; color:var(--text); transition:transform .2s, box-shadow .2s}
    .skill-chip:hover{transform:translateY(-4px); box-shadow:0 8px 28px rgba(139,50,255,0.12)}

    /* projects */
    .projects{padding:30px 40px;border-top:1px dashed rgba(255,255,255,0.03)}
    .projects-grid{display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:18px; margin-top:14px}
    .project-card{background:var(--card); border-radius:12px; overflow:hidden; border:1px solid rgba(255,255,255,0.04); transition:transform .28s, box-shadow .28s}
    .project-card:hover{transform:translateY(-8px); box-shadow:0 20px 50px rgba(139,50,255,0.12)}
    .project-card img{width:100%; height:160px; object-fit:cover; display:block}
    .project-card .content{padding:12px 14px}
    .project-card h6{margin:0 0 8px; font-weight:800}
    .project-card p{margin:0; color:var(--muted); font-size:13px}

    /* contact */
 /* Contact section layout */
    .contact-container {
      display: flex; gap: 30px; align-items: flex-start; flex-wrap: wrap;
    }
    .form-card {
      flex: 1; min-width: 320px;
      background: rgba(255,255,255,0.03);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 12px;
      padding: 18px;
      backdrop-filter: blur(8px);
      transition: all 0.3s ease;
    }
    .form-card:hover { box-shadow: 0 0 25px rgba(139,50,255,0.3); }

    .form-control {
      background: transparent; color: #fff;
      border: 1px solid rgba(255,255,255,0.12);
    }
    .form-control:focus {
      border-color: var(--accent);
      box-shadow: 0 0 10px rgba(139,50,255,0.4);
    }

    /* social side card */
    .social-card {
      width: 200px;
      background: rgba(255,255,255,0.04);
      border: 1px solid rgba(255,255,255,0.06);
      border-radius: 12px;
      padding: 18px;
      text-align: center;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      transition: all 0.3s;
    }
    .social-card:hover { transform: translateY(-5px); box-shadow: 0 0 25px rgba(139,50,255,0.4); }
    .social-card h6 { color: var(--accent-2); font-weight: 700; margin-bottom: 12px; }

    .social-icons a {
      display: inline-flex; align-items: center; justify-content: center;
      width: 42px; height: 42px;
      border-radius: 50%;
      margin: 5px;
      background: rgba(139,50,255,0.12);
      color: #fff;
      transition: 0.3s;
      box-shadow: 0 0 10px rgba(139,50,255,0.2);
    }
    .social-icons a:hover {
      background: var(--accent);
      box-shadow: 0 0 20px rgba(139,50,255,0.8);
      transform: translateY(-4px);
    }

    /* footer */
    .panel-footer{padding:20px; text-align:center; background:linear-gradient(90deg, rgba(30,6,46,0.9), rgba(45,12,86,0.9)); color:rgba(255,255,255,0.8)}
    .panel-footer a{color:var(--text); margin:0 8px; display:inline-inline; transition:transform .22s, color .22s}
    .panel-footer a:hover{transform:translateY(-4px); color:var(--accent-2)}

    /* section reveal animations (initial state) */
    .animate-on-scroll{opacity:0; transform:translateY(18px); transition:opacity .66s ease, transform .66s cubic-bezier(.2,.9,.3,1)}
    .animate-on-scroll.revealed{opacity:1; transform:translateY(0)}

    /* small helpers */
    .small-muted{color:var(--muted); font-size:13px}
    @media (max-width:900px){
      .hero{flex-direction:column; text-align:center}
      .hero-right{width:100%}
      .about-skills{flex-direction:column}
      .skills{width:100%}
    }
  /* ==== SECTION FORMATION & LANGUES ==== */
    .timeline-section {
      position: relative;
      margin: auto;
      padding: 40px 20px;
      border-radius: 18px;
      background: linear-gradient(180deg, rgba(139,50,255,0.08), rgba(0,0,0,0.15));
      box-shadow: 0 10px 40px rgba(139,50,255,0.15);
      overflow: hidden;
      border: 1px solid rgba(255,255,255,0.05);
      max-width: 800px;
    }

    .timeline-section::before {
      content: "";
      position: absolute;
      top: 0; left: 50%;
      transform: translateX(-50%);
      width: 3px;
      height: 100%;
      background: linear-gradient(to bottom, var(--accent), transparent);
      opacity: 0.3;
    }

    .timeline-item {
      position: relative;
      padding: 20px 40px;
      margin-bottom: 25px;
      width: 100%;
    }
    .timeline-item:last-child { margin-bottom: 0; }

    .timeline-item::before {
      content: "";
      position: absolute;
      top: 25px; left: 50%;
      transform: translateX(-50%);
      width: 16px; height: 16px;
      border-radius: 50%;
      background: var(--accent);
      box-shadow: 0 0 10px var(--accent);
    }

    .timeline-content {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 12px;
      padding: 18px 22px;
      max-width: 450px;
      position: relative;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .timeline-content:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 25px rgba(139,50,255,0.25);
    }

    .timeline-content strong {
      color: var(--accent-2);
      font-size: 15px;
    }

    .timeline-content p {
      margin: 4px 0 0;
      color: var(--muted);
      font-size: 14px;
      line-height: 1.6;
    }

    /* Align left/right alternance */
    .timeline-item:nth-child(odd) .timeline-content {
      margin-right: auto;
      text-align: right;
    }
    .timeline-item:nth-child(even) .timeline-content {
      margin-left: auto;
      text-align: left;
    }

    /* LANGUES */
    .langues-container {
      margin-top: 30px;
      text-align: center;
    }

    .langues-container h6 {
      color: var(--accent-2);
      font-weight: 800;
      margin-bottom: 15px;
      position: relative;
      display: inline-block;
    }

    .langues-container h6::after {
      content: "";
      position: absolute;
      bottom: -6px; left: 0;
      width: 100%;
      height: 3px;
      border-radius: 2px;
      background: linear-gradient(90deg, var(--accent), transparent);
    }

    .langues-list {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 12px;
    }

    .langue-pill {
      background: linear-gradient(135deg, rgba(139,50,255,0.18), rgba(215,184,255,0.1));
      color: var(--text);
      border-radius: 999px;
      padding: 8px 18px;
      font-weight: 600;
      letter-spacing: 0.3px;
      transition: all 0.3s ease;
      border: 1px solid rgba(255,255,255,0.1);
      backdrop-filter: blur(4px);
    }

    .langue-pill:hover {
      background: var(--accent);
      color: #fff;
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(139,50,255,0.4);
    }

    /* Icône flottante animée */
    @keyframes floatIcon {
      0%, 100% { transform: translateY(0); opacity: 0.8; }
      50% { transform: translateY(-6px); opacity: 1; }
    }

    .timeline-section .fa-graduation-cap {
      position: absolute;
      top: -18px; left: 50%;
      transform: translateX(-50%);
      color: var(--accent-2);
      font-size: 32px;
      animation: floatIcon 3s ease-in-out infinite;
    }

    /* Animation d'apparition */
    .timeline-section {
      opacity: 0;
      transform: translateY(40px);
      transition: all 0.8s ease;
    }

    .timeline-section.visible {
      opacity: 1;
      transform: translateY(0);
    }

  </style>
</head>
<body>

  <div class="site-wrap">
    <div class="main-card">

      <!-- topbar -->
      <div class="topbar animate-on-scroll" data-aos>
        <div class="brand">
          <div class="dot">HA</div>
          <div>
            <div style="font-size:14px">Sossé Alaoui</div>
            <div style="font-size:11px;color:var(--muted)">Développeuse Full Stack</div>
          </div>
        </div>

        <div class="nav-links d-none d-md-flex">
          <a href="#about">À propos</a>
          <a href="#projects">Projets</a>
          <a href="#contact">Contact</a>
        </div>
      </div>

      <!-- hero -->
      <section class="hero animate-on-scroll" id="hero" data-aos>
        <div class="hero-left">
          <div class="hi">Bonjour 👋</div>
          <h1 class="title">Je suis <span style="color:var(--accent)">Sossé Alaoui Hajar</span></h1>
          <p class="subtitle">Développeuse Full Stack diplômée — front-end (React, HTML, CSS, JS) & back-end (PHP, Laravel, MySQL). J'apprécie le code propre, la performance et les interfaces accessibles.</p>

          <div class="hero-actions">
            <a href="#projects" class="btn-outline btn btn-sm"><i class="fa fa-eye me-2"></i>Voir mes projets</a>
            <a href="#contact" class="btn-accent btn btn-sm"><i class="fa fa-paper-plane me-2"></i>Me contacter</a>
          </div>

          <div style="margin-top:14px" class="small-muted">
            <strong>Email :</strong> <a href="mailto:sossealaoui.hajar1@gmail.com" style="color:var(--text); text-decoration:underline">sossealaoui.hajar1@gmail.com</a> &nbsp; • &nbsp;
            <strong>Tél :</strong> <a href="tel:+212679631663" style="color:var(--text); text-decoration:underline">+212 679 631 663</a>
            <div style="margin-top:6px">Disponible pour freelance & CDI</div>
          </div>
        </div>

        <div class="hero-right">
          <!-- change src to your portrait / illustration -->
          <img class="profile-photo" src="WhatsApp Image 2025-10-13 à 12.16.41_405f43aa.jpg" alt="Photo de Sossé Alaoui Hajar">
        </div>

      </section>

      <!-- about + skills -->
      <section id="about" class="about-skills animate-on-scroll" data-aos>
        <div class="about">
          <h4>À propos</h4>
          <p>Je suis une développeuse web full-stack junior, passionnée par les technologies modernes et le développement digital. Je maîtrise Laravel et React pour la création d’applications performantes, ainsi que HTML, CSS, MySQL et MongoDB pour le développement complet du backend au frontend.
Curieuse, rigoureuse et motivée, j’aime apprendre en continu, relever de nouveaux défis techniques et participer à la réalisation de projets web innovants et impactants. Mon objectif est de mettre mes compétences au service d’expériences numériques modernes, efficaces et centrées sur l’utilisateur.</p>

    
  <div class="timeline-section" id="formations">
    <i class="fa-solid fa-graduation-cap"></i>
    <h6 style="text-align:center; color:var(--accent-2); font-weight:800;">Mon Parcours</h6>

    <div class="timeline-item">
      <div class="timeline-content">
        <strong>2023–2025</strong> — ISTA Al Adarissa (Fès)
        <p>Technicien Spécialisé en Développement Digital (Web Full Stack)</p>
      </div>
    </div>

    <div class="timeline-item">
      <div class="timeline-content">
        <strong>2022–2023</strong> — Faculté Dhar El Mehraz
        <p>1ère année Sciences Économiques & Gestion</p>
      </div>
    </div>

    <div class="timeline-item">
      <div class="timeline-content">
        <strong>2021–2022</strong> — Lycée Ibn Elhaytam
        <p>Baccalauréat Sciences Physiques & Chimie</p>
      </div>
    </div>

    <div class="langues-container">
      <h6><i class="fa-solid fa-language me-2"></i>Langues</h6>
      <div class="langues-list">
        <span class="langue-pill">Arabe</span>
        <span class="langue-pill">Français</span>
        <span class="langue-pill">Anglais</span>
        <span class="langue-pill">Allemand</span>
      </div>
    </div>
  </div>
        </div>

        <aside class="skills" style="margin-top:200px">
          <h6 style="margin-bottom:12px ">Compétences techniques</h6>
          <div>
          <span class="skill-chip"><i class="fa-brands fa-html5"></i> HTML5</span>
          <span class="skill-chip"><i class="fa-brands fa-css3-alt"></i> CSS3</span>
          <span class="skill-chip"><i class="fa-brands fa-js"></i> JS</span>
          <span class="skill-chip"><i class="fa-brands fa-react"></i> React</span>
          <span class="skill-chip"><i class="fa-brands fa-php"></i> PHP</span>
          <span class="skill-chip"><i class="fa-brands fa-laravel"></i> Laravel</span>
          <span class="skill-chip"><i class="fa-solid fa-database"></i> MySQL</span>
          <span class="skill-chip"><i class="fa-brands fa-git-alt"></i> Git</span>
          <span class="skill-chip"><i class="fa-brands fa-bootstrap"></i> Bootstrap</span>
          <span class="skill-chip"><i class="fa-solid fa-leaf"></i> MongoDB</span>
          <span class="skill-chip"><i class="fa-brands fa-python"></i> Python</span>
          <span class="skill-chip"><i class="fa-solid fa-server"></i> Express.js</span>
        </div>

      
        </aside>
      </section>

      <!-- projects -->
      <section id="projects" class="projects animate-on-scroll" data-aos>
        <h5 style="font-weight:800">Projets</h5>
        <div class="small-muted" style="margin-top:6px">Quelques réalisations extraites du CV</div>

        <div class="projects-grid">
          <article class="project-card" data-aos>
            <img src="Capture d'écran 2025-10-11 123956.png" alt="Site de vente maquillage">
            <div class="content">
              <h6>Site de vente de maquillage</h6>
              <p>Prototype responsive : gestion de produits et utilisateurs. Tech : PHP, MySQL, HTML, CSS.</p>
            </div>
          </article>

          <article class="project-card" data-aos>
            <img src="home.png" alt="Réservation guides">
            <div class="content">
              <h6>Application de réservation de guides</h6>
              <p>Platforme de mise en relation guides / touristes : recherche, réservation, gestion de profils. Tech : Laravel, MySQL.</p>
            </div>
          </article>

          <article class="project-card animate-on-scroll" data-aos>
            <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80" alt="Projet à venir">
            <div class="content">
              <h6>Projet à venir</h6>
              <p>En cours — détails à venir (captures & repo à ajouter).</p>
            </div>
          </article>
        </div>
      </section>

      <!-- contact -->
 <!-- CONTACT -->
      <section id="contact" data-aos="fade-up">
        <h2 style="color:var(--accent-2); font-weight:700;">Contact</h2>
        <p class="subtitle">Envie de collaborer ou de discuter d’un projet ? Remplissez le formulaire ou retrouvez-moi sur mes réseaux.</p>

        <div class="contact-container mt-4">
          <!-- FORMULAIRE -->
       <form id="contactForm" method="POST" action="envoyer_message.php">
        <input type="text" class="form-control" id="name" name="nom" placeholder="Votre nom" required>
        <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Votre message" required></textarea>
        <button type="submit" class="btn-dore w-100 mt-2">
          <i class="fa fa-paper-plane me-2"></i>Envoyer
        </button>
      </form>

          <!-- SOCIAL -->
          <div class="social-card" data-aos="fade-left">
            <h6>Mes Réseaux</h6>
            <div class="social-icons">
              <a href="https://www.linkedin.com/in/hajar-alaoui-sossé" target="_blank" title="LinkedIn"><i class="fa-brands fa-linkedin fa-lg"></i></a>
              <a href="https://github.com/sossealaouihajar1-a11y" title="GitHub (ajouter lien plus tard)" target="_blank"><i class="fa-brands fa-github fa-lg"></i></a>
            </div>
            <p class="mt-2" style="font-size:13px; color:var(--muted);">Disponible pour projets freelance ou CDI.</p>

           <button onclick="window.open('CV.pdf', '_blank')" class="btn-accent btn btn-sm">Voir mon CV</button> 

          </div>
        </div>
      </section>

      <!-- footer -->
      <footer class="panel-footer animate-on-scroll" data-aos>
        <div style="font-weight:800">Sossé Alaoui Hajar</div>
        <div class="small-muted" style="margin-top:6px">© 2025 — Portfolio personnel</div>
        <div style="margin-top:10px">
          <a href="https://www.linkedin.com/in/hajar-alaoui-sossé" target="_blank" aria-label="LinkedIn de Hajar"><i class="fa-brands fa-linkedin fa-lg"></i></a>
          <a href="https://github.com/sossealaouihajar1-a11y" target="_blank" aria-label="GitHub de Hajar (à ajouter)"><i class="fa-brands fa-github fa-lg"></i></a>
        </div>
      </footer>

    </div>
  </div>

  <!-- Minimal JS: scroll reveal + simple form behavior + smooth scroll -->
  <script>
    // Smooth internal link scrolling
    document.querySelectorAll('a[href^="#"]').forEach(a=>{
      a.addEventListener('click', function(e){
        const tgt = document.querySelector(this.getAttribute('href'));
        if(tgt){ e.preventDefault(); tgt.scrollIntoView({behavior:'smooth', block:'start'}); }
      });
    });

    // IntersectionObserver reveal
    (function(){
      const obs = new IntersectionObserver((entries, o)=>{
        entries.forEach(e=>{
          if(e.isIntersecting){
            e.target.classList.add('revealed');
            o.unobserve(e.target);
          }
        });
      }, {threshold: 0.12});

      document.querySelectorAll('.animate-on-scroll').forEach(el=>{
        // stagger small child elements for nicer effect
        el.style.willChange = 'transform, opacity';
        obs.observe(el);
      });

      // Also reveal individual project cards with slight delay
      document.querySelectorAll('.projects-grid .project-card').forEach((card, i)=>{
        setTimeout(()=> card.classList.add('revealed'), 180 * (i+1));
      });
    })();

    // Small form handler (demo)


        document.getElementById('contactForm').addEventListener('submit', function(e){
        // e.preventDefault();
        const formData = new FormData(this);
        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }
    

        // Envoi normal après test
        this.submit();

    });


const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('success')) {
    alert('✅ Merci pour votre message ! Je vous répondrai bientôt.');
    // Supprime le paramètre pour éviter que l’alerte se relance si on recharge la page
    window.history.replaceState({}, document.title, window.location.pathname);
}



    
    // formations
        window.addEventListener('scroll', () => {
      const section = document.getElementById('formations');
      const rect = section.getBoundingClientRect();
      if (rect.top < window.innerHeight - 150) {
        section.classList.add('visible');
      }
    });

  </script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        alert('✅ Merci pour votre message ! Je vous répondrai bientôt.');
        // remove ?success=1 from URL after showing alert
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});
</script>


</body>
</html>
