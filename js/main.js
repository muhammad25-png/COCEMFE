/**
 * COCEMFE Ceuta - Scripts Principales (main.js)
 * Funcionalidades interactivas en Vanilla JS
 */

document.addEventListener('DOMContentLoaded', () => {

    // ==========================================
    // 1. MENÚ MÓVIL Y DROPDOWNS
    // ==========================================
    const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
    const navMenu = document.querySelector('.nav-menu');
    const navCloseBtn = document.querySelector('.nav-close-btn');
    const navItems = document.querySelectorAll('.nav-item');

    // Abrir menú móvil
    if (mobileNavToggle && navMenu) {
        mobileNavToggle.addEventListener('click', () => {
            navMenu.classList.add('open');
        });
    }

    // Cerrar menú móvil
    if (navCloseBtn && navMenu) {
        navCloseBtn.addEventListener('click', () => {
            navMenu.classList.remove('open');
        });
    }

    // Manejar dropdowns en móvil
    navItems.forEach(item => {
        const link = item.querySelector('.nav-link');
        const dropdown = item.querySelector('.dropdown-menu');
        
        if (link && dropdown) {
            link.addEventListener('click', (e) => {
                // Solo aplicar en modo móvil (ancho de pantalla <= 768px)
                if (window.innerWidth <= 768) {
                    e.preventDefault(); // Evitar navegación en enlaces con dropdown en móvil
                    dropdown.classList.toggle('open');
                    
                    // Rotar icono de flecha
                    const icon = link.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('fa-angle-up');
                        icon.classList.toggle('fa-angle-down');
                    }
                }
            });
        }
    });


    // ==========================================
    // 2. BOTÓN VOLVER ARRIBA (Scroll to Top)
    // ==========================================
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    
    if (scrollTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }


    // ==========================================
    // 3. CARRUSEL DE IMÁGENES (Hero Slideshow)
    // ==========================================
    const slides = document.querySelectorAll('.hero-slider .slide');
    const prevBtn = document.querySelector('.slider-arrow-prev');
    const nextBtn = document.querySelector('.slider-arrow-next');
    const dotsContainer = document.querySelector('.slider-dots');
    
    if (slides.length > 0) {
        let currentSlide = 0;
        let slideInterval;
        const intervalTime = 8000; // 8 segundos

        // Crear dots
        slides.forEach((_, index) => {
            const dot = document.createElement('button');
            dot.classList.add('slider-dot');
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => {
                goToSlide(index);
                resetInterval();
            });
            if (dotsContainer) {
                dotsContainer.appendChild(dot);
            }
        });

        const dots = document.querySelectorAll('.slider-dot');

        function goToSlide(n) {
            slides[currentSlide].classList.remove('active');
            if (dots[currentSlide]) dots[currentSlide].classList.remove('active');
            
            currentSlide = (n + slides.length) % slides.length;
            
            slides[currentSlide].classList.add('active');
            if (dots[currentSlide]) dots[currentSlide].classList.add('active');
        }

        function nextSlide() {
            goToSlide(currentSlide + 1);
        }

        function prevSlide() {
            goToSlide(currentSlide - 1);
        }

        // Eventos de botones
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
                resetInterval();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                prevSlide();
                resetInterval();
            });
        }

        // Iniciar intervalo automático
        function startInterval() {
            slideInterval = setInterval(nextSlide, intervalTime);
        }

        function resetInterval() {
            clearInterval(slideInterval);
            startInterval();
        }

        startInterval();
    }


    // ==========================================
    // 4. INTERACTIVIDAD DE TABS (Misión, Visión, Valores)
    // ==========================================
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    if (tabButtons.length > 0) {
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const target = button.getAttribute('data-tab');

                // Quitar clase activa de botones y contenidos
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Añadir clase activa al botón pulsado y su contenido
                button.classList.add('active');
                const targetContent = document.getElementById(target);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            });
        });
    }


    // ==========================================
    // 5. ACORDEÓN INTERACTIVO (Ocio y Tiempo Libre)
    // ==========================================
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    if (accordionHeaders.length > 0) {
        accordionHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const item = header.parentElement;
                const content = item.querySelector('.accordion-content');
                const isActive = item.classList.contains('active');

                // Cerrar todos los demás elementos del acordeón
                document.querySelectorAll('.accordion-item').forEach(accItem => {
                    accItem.classList.remove('active');
                    const accContent = accItem.querySelector('.accordion-content');
                    if (accContent) accContent.style.maxHeight = null;
                });

                // Si no estaba activo, abrirlo
                if (!isActive) {
                    item.classList.add('active');
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        });
    }

});
