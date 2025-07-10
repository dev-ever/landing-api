   AOS.init({

    duration: 1000, // duración de animaciones

    once: true // si quieres que se animen solo una vez

  });



 // Smooth scrolling and active navigation
document.querySelectorAll('.nav-link, .cta-button').forEach(link => {

    link.addEventListener('click', function(e) {

        e.preventDefault();
        
        // Remove active class from all links
        document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
        
        // Add active class to clicked link
        this.classList.add('active');
        
        // Smooth scroll to section
        const targetId = this.getAttribute('href').substring(1);

        const targetSection = document.getElementById(targetId);

        
        if (targetSection) {

            targetSection.scrollIntoView({

                behavior: 'smooth',

                block: 'start'

            });

        }

    });

});

// Header background change on scroll
window.addEventListener('scroll', function() {

    const header = document.querySelector('header');
    const up = document.getElementById('scrollUp');
    
    if (window.scrollY > 50) {

        header.classList.add('scrolled');
        up.style.opacity = '1';
        up.style.pointerEvents = 'auto';

    } else {

        header.classList.remove('scrolled');

          up.style.opacity = '0';
          up.style.pointerEvents = 'none';
    }
    
    // Update active nav on scroll
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');
    
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (pageYOffset >= sectionTop - 200) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});

        

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.8s ease-out';
                }
            });
        }, observerOptions);

        // Observe all service cards and client cards
        document.querySelectorAll('.service-card, .cliente-card').forEach(card => {
            observer.observe(card);
        });




/*=======================================
  PROCESAMIENTO DE LA APÍ DE CONTACTO
==========================================*/

document.getElementById('contactForm').addEventListener('submit', function(e) {

    e.preventDefault(); 

    const data = {
        
        nombre: document.getElementById('nombre').value.trim(),
        email: document.getElementById('email').value.trim(),
        telefono: document.getElementById('telefono').value.trim(),
        mensaje: document.getElementById('mensaje').value.trim()
    };

    if (!data.nombre || !data.email || !data.telefono || !data.mensaje) {

        Swal.fire({
            icon: 'warning',
            title: 'Campos incompletos',
            text: 'Por favor completa todos los campos.',
            confirmButtonColor: '#3085d6'
        });

        return;
    }




    fetch('https://contactos.emauro.com.mx/api/contacto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })

       .then(resp => resp.json())

       .then(respuesta => {

        if (respuesta.mensaje) { 

            Swal.fire({
              position: "center",
              icon: "success",
              title: "¡Mensaje enviado correctamente!",
              showConfirmButton: true,
              allowoutsideclick:false,
              confirmButtonText: "Acept",
              timer: 3000

        });

            // alert('Mensaje enviado correctamente');

            document.getElementById('contactForm').reset();

        } else {

            alert('Error: ' + (respuesta.error || 'Error al enviar mensaje'));

        }

    })
       .catch(error => {

        console.error('Error de red:', error);

        alert('No se pudo enviar el mensaje');

    });


})