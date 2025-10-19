
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

    document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        alert('✅ Merci pour votre message ! Je vous répondrai bientôt.');
        // remove ?success=1 from URL after showing alert
        window.history.replaceState({}, document.title, window.location.pathname);
    }
    });

