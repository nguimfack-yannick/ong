<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABEC - ONG Humanitaire</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="image/logo.png">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Police Inter -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: '#1E90FF',   /* Bleu principal */
              secondary: '#87CEFA',  /* Bleu plus clair */
              yellow: '#FFD700'      /* Jaune pour les boutons */
            }
          }
        }
      }
    </script>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Styles personnalisés -->
    <style>
      [x-cloak] { display: none; }
      @media (prefers-reduced-motion: reduce) {
        .transition, [x-transition] { transition: none !important; }
        .animate-bounce { animation: none !important; }
      }

      /* Retiré le background du body (l'image est maintenant sur la section hero) */
      body {
        background-color: #ffffff;
        font-family: 'Inter', sans-serif; /* Utilisation de la police Inter */
      }
      .partner-logo {
        width: 120px;               /* Taille uniforme */
        height: 120px;              /* Taille uniforme */
        object-fit: cover;          /* Remplissage proportionnel */
        box-shadow: 0 4px 10px rgba(0,0,0,0.3); /* Ombre douce derrière les logos */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .partner-logo.center {
        transform: scale(1.2);      /* Agrandissement du logo central */
        box-shadow: 0 8px 20px rgba(0,0,0,0.4); /* Ombre plus prononcée pour le central */
      }

      .carousel {
        display: flex;
        gap: 40px;                  /* Espacement entre les logos */
        justify-content: center;
        align-items: center;
        transition: transform 0.5s ease;
      }

      .carousel-container {
        overflow: hidden;
        position: relative;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .dot {
        width: 10px;
        height: 10px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        margin: 0 5px;
        cursor: pointer;
      }
      .dot.active {
        background-color: #1E90FF;
      }
      .dropdown-menu {
        background-color: white;
        z-index: 50;
      }
      .arrow {
        cursor: pointer;
        font-size: 2rem;
        color: #1E90FF;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
      }
      .arrow-left {
        left: 10px;
      }
      .arrow-right {
        right: 10px;
      }

      /* Slider CSS (fallback simple) */
      @keyframes slide {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
      }
      .animate-slide {
        display: flex;
        animation: slide 20s linear infinite;
      }

      /* Assurer texte en gras globalement */
      .font-all-bold, body, h1, h2, h3, p, a, li { font-weight: bold; }
    </style>
</head>
<body id="top" x-data="{ mobileMenuOpen: false, dropdownOpen: false }" class="bg-white font-sans antialiased font-all-bold">

    <!-- Top Bar -->
    <nav class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-10">
                <!-- Icônes des réseaux sociaux -->
                <div class="flex items-center space-x-4">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="hover:opacity-80" title="Facebook">
                        <img src="feacebook.jpg" alt="Facebook" class="w-6 h-6 rounded-full">
                    </a>
                    <!-- WhatsApp -->
                    <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:opacity-80" title="WhatsApp">
                        <img src="wastapp.jpg" alt="WhatsApp" class="w-6 h-6 rounded-full">
                    </a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="hover:opacity-80" title="Instagram">
                        <img src="insta.jpg" alt="Instagram" class="w-6 h-6 rounded-full">
                    </a>
                </div>
                <!-- Coordonnées de contact -->
                <a href="mailto:globaluniversalwelfare@gmail.com" class="hover:opacity-80" title="Email">
                    <img src="m.jpg" alt="Email" class="w-6 h-6 rounded-full">
                </a>
            </div>
        </div>
    </nav>

    <!-- Nav Bar Principale -->
    <header class="bg-white shadow py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 w-6/12 sm:w-4/12 md:w-2/12 h-auto flex justify-center">
                    <img src="abec.png" alt="logo" class="w-8/12 sm:w-6/12 md:w-5/12 lg:w-4/12">
                </div>

                <!-- Navigation Desktop -->
                <nav class="hidden md:flex space-x-4">
                    <a href="#top" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Options</button>
                        <div x-show="open" @click.away="open = false" class="absolute mt-2 w-48 bg-white shadow-lg rounded-md dropdown-menu z-50">
                            <a href="#vision" class="block px-4 py-2 text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Notre Vision</a>
                            <a href="#mission" class="block px-4 py-2 text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Notre Mission</a>
                            <a href="#objectifs" class="block px-4 py-2 text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Nos Objectifs Institutionnels</a>
                        </div>
                    </div>
                    <a href="#actions" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Nos Actions</a>
                    <a href="actualites.html" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Actualités</a>
                    <a href="#contact" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Contact</a>
                    <a href="branches.html" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Branches</a>
                    <a href="#about" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">À propos</a>
                </nav>

                <!-- Menu Mobile -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 focus:outline-none">
                        <svg x-show="!mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden px-2 pt-2 pb-3 space-y-1">
            <a href="#top" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Options</button>
                <div x-show="open" @click.away="open = false" class="pl-4 space-y-1 dropdown-menu z-50">
                    <a href="#vision" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Notre Vision</a>
                    <a href="#mission" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Notre Mission</a>
                    <a href="#objectifs" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Nos Objectifs Institutionnels</a>
                </div>
            </div>
            <a href="#actions" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Nos Actions</a>
            <a href="actualites.html" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Actualités</a>
            <a href="#contact" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Contact</a>
            <a href="branches.html" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Branches</a>
            <a href="#about" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">À propos</a>
        </div>
    </header>

    <!-- Hero Section: image en arrière-plan (fotos4.jpg) + overlay dégradé -->
    <section class="relative h-screen overflow-hidden bg-cover bg-center" style="background-image: url('santos/image/fotos.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-center text-center">
            <div>
                <h1 class="text-5xl font-extrabold text-white sm:text-6xl relative inline-block">
                    <span class="invisible">Organisation du Bien-Être Communautaire</span>
                    <span class="absolute top-0 left-0">Organisation du Bien-Être Communautaire</span>
                </h1>
                <p class="mt-4 text-xl font-bold text-gray-100">
                    Une ONG dédiée à l’aide humanitaire : dons essentiels pour hôpitaux et orphelinats.
                </p>
                <div class="mt-8">
                    <a href="santos/dons.php" class="inline-block bg-yellow text-gray-800 px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105">
                        Faites un don
                    </a>
                    <a href="#about" class="inline-block ml-4 bg-yellow text-gray-800 px-8 py-3 font-bold rounded-md hover:bg-gray-100 transition transform hover:scale-105">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-8 w-full flex justify-center z-10">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </section>

    <!-- Section À propos -->
    <section id="about" class="py-16 bg-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900">À propos d'ABEC</h2>
            <p class="mt-4 font-bold text-gray-600 leading-relaxed">
                ABEC est une ONG humanitaire qui se consacre à soutenir les hôpitaux et orphelinats en fournissant des dons essentiels...
            </p>
            <!-- Video Embed -->
            <div class="mt-8 flex justify-center">
                <video class="w-full max-w-3xl rounded-lg shadow-lg" controls>
                    <source src="orange.mp4" type="video/mp4">
                    Votre navigateur ne prend pas en charge la lecture de vidéos.
                </video>
            </div>
        </div>
    </section>

<!-- Section Nos Actions -->
<section id="actions" class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900">Nos Actions</h2>
        <p class="mt-4 font-bold text-gray-700 leading-relaxed">
            Découvrez nos projets phares pour soutenir les hôpitaux et orphelinats. Nous mettons en œuvre divers programmes visant à améliorer l'accès aux soins et à offrir un environnement sûr et stimulant pour l'éducation des plus jeunes.
        </p>
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-4 rounded shadow-lg text-center">
                <img src="santos/image/fotos.jpg" alt="Dons aux Hôpitaux" class="w-full h-40 object-cover rounded-lg shadow-md">
                <h3 class="font-bold text-gray-800 mt-2">Dons aux Hôpitaux</h3>
                <p class="text-gray-600 mt-2">
                    Fourniture de matériel médical essentiel, formations pour le personnel et soutien aux infrastructures sanitaires dans les zones démunies.
                </p>
            </div>
            <div class="bg-white p-4 rounded shadow-lg text-center">
                <img src="santos/image/fotos2.jpg" alt="Soutien aux Orphelinats" class="w-full h-40 object-cover rounded-lg shadow-md">
                <h3 class="font-bold text-gray-800 mt-2">Soutien aux Orphelinats</h3>
                <p class="text-gray-600 mt-2">
                    Dons alimentaires, éducatifs et matériels pour offrir un environnement chaleureux et bien équipé aux enfants en difficulté.
                </p>
            </div>
            <div class="bg-white p-4 rounded shadow-lg text-center">
                <img src="santos/image/fotos.jpg" alt="Programmes Communautaires" class="w-full h-40 object-cover rounded-lg shadow-md">
                <h3 class="font-bold text-gray-800 mt-2">Programmes Communautaires</h3>
                <p class="text-gray-600 mt-2">
                    Initiatives pour sensibiliser aux enjeux de santé et d’éducation, ateliers communautaires et partenariats locaux pour un soutien durable.
                </p>
            </div>
            <div class="bg-white p-4 rounded shadow-lg text-center">
                <img src="santos/image/fotos4.jpg" alt="Campagnes de Sensibilisation" class="w-full h-40 object-cover rounded-lg shadow-md">
                <h3 class="font-bold text-gray-800 mt-2">Campagnes de Sensibilisation</h3>
                <p class="text-gray-600 mt-2">
                    Organisation d’événements et de campagnes pour impliquer directement les citoyens et promouvoir une approche collective face aux défis sociaux.
                </p>
            </div>
        </div>
        <p class="mt-8 font-bold text-gray-600 leading-relaxed">
            Chaque action, même petite, contribue à transformer des vies. Soutenez-nous et faites la différence dans la vie des plus démunis.
        </p>
    </div>
</section>


    <!-- Section Nos Partenaires -->
    <section id="partners" class="py-16 bg-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900">Nos Partenaires</h2>
            <div class="carousel-container mt-8 relative">
                <div class="carousel" id="carousel">
                    <img src="santos/image/brasserie (3).png" alt="Partner 1" class="partner-logo">
                    <img src="santos/image/brasserie (4).png" alt="Partner 2" class="partner-logo">
                    <img src="santos/image/brasserie (5).png" alt="Partner 3" class="partner-logo">
                    <img src="santos/image/brasserie (7).png" alt="Partner 5" class="partner-logo">
                    <img src="santos/image/aas.png" alt="aas" class="partner-logo">
                </div>
                <span class="arrow arrow-left" onclick="moveSlide(-1)">&#10094;</span>
                <span class="arrow arrow-right" onclick="moveSlide(1)">&#10095;</span>
            </div>
            <div class="mt-4 flex justify-center space-x-2">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-primary text-white" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col items-center text-center">
                <!-- Première partie du footer -->
                <nav>
                    <ul class="flex flex-col space-y-2">
                        <li><a href="#top" class="text-sm font-bold hover:text-gray-200">Accueil</a></li>
                        <li><a href="#about" class="text-sm font-bold hover:text-gray-200">À propos</a></li>
                        <li><a href="#actions" class="text-sm font-bold hover:text-gray-200">Nos Actions</a></li>
                        <li><a href="actualites.html" class="text-sm font-bold hover:text-gray-200">Actualités</a></li>
                        <li><a href="#contact" class="text-sm font-bold hover:text-gray-200">Contact</a></li>
                    </ul>
                </nav>
                <hr class="my-4 border-gray-300 w-full" /> <!-- Ligne de séparation ajoutée ici -->
                <p class="text-sm font-bold mt-4">Basée à Yaoundé, Cameroun</p>
                <a href="#top" class="mt-4 inline-block text-sm font-bold hover:text-gray-200">Retour en haut</a>
                <hr class="my-4 border-gray-300 w-full" />
                <!-- Deuxième partie du footer -->
                <p class="text-sm font-bold mt-4">Organisation internationale. Tous droits réservés.</p>
                <p class="text-xs mt-2">Suivez-nous sur nos réseaux sociaux :</p>
                <div class="flex space-x-4 mt-2">
                    <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="hover:opacity-80" title="Facebook">
                        <img src="feacebook.jpg" alt="Facebook" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:opacity-80" title="WhatsApp">
                        <img src="wastapp.jpg" alt="WhatsApp" class="w-6 h-6 rounded-full">
                    </a>
                    <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="hover:opacity-80" title="Instagram">
                        <img src="insta.jpg" alt="Instagram" class="w-6 h-6 rounded-full">
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Animation texte + carousel script -->
    <script>
      function letterAnimation() {
        return {
          text: "Organisation du Bien-Être Communautaire",
          displayedText: '',
          typeSpeed: 100,
          eraseSpeed: 100,
          pauseAfterType: 900,
          pauseAfterErase: 300,
          start() {
            this.displayedText = '';
            this.showLetters();
          },
          showLetters() {
            let index = 0;
            let interval = setInterval(() => {
              this.displayedText += this.text[index];
              index++;
              if (index === this.text.length) {
                clearInterval(interval);
                setTimeout(() => { this.eraseLetters(); }, this.pauseAfterType);
              }
            }, this.typeSpeed);
          },
          eraseLetters() {
            let interval = setInterval(() => {
              this.displayedText = this.displayedText.slice(1);
              if (this.displayedText.length === 0) {
                clearInterval(interval);
                setTimeout(() => { this.showLetters(); }, this.pauseAfterErase);
              }
            }, this.eraseSpeed);
          }
        }
      }

      // Carousel script
      let slideIndex = 1;
      let autoSlideInterval;
      showSlides(slideIndex);

      function currentSlide(n) {
        clearInterval(autoSlideInterval);
        showSlides(slideIndex = n);
        startAutoSlide();
      }

      function moveSlide(n) {
        clearInterval(autoSlideInterval);
        showSlides(slideIndex += n);
        startAutoSlide();
      }

      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("partner-logo");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].classList.remove("center");
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].classList.remove("active");
        }
        if (slides.length) {
          slides[slideIndex-1].classList.add("center");
        }
        if (dots.length) {
          dots[slideIndex-1].classList.add("active");
        }
        // translate based on index (simple percent; adjust if logos count/size change)
        document.getElementById("carousel").style.transform = `translateX(-${(slideIndex-1) * 20}%)`;
      }

      function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
          slideIndex++;
          showSlides(slideIndex);
        }, 4000);
      }

      startAutoSlide();
    </script>
</body>
</html>
