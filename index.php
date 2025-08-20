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
            secondary: '#87CEFA' /* Bleu plus clair */
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
  </style>
</head>
<body id="top" x-data="{ mobileMenuOpen: false }" class="bg-white font-sans antialiased">

  <!-- Top Bar -->
   <nav class="bg-primary text-white">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="flex items-center justify-between h-10">
                  <!-- Icônes des réseaux sociaux -->
                 <div class="flex items-center space-x-4">
      
      <!-- Facebook -->
      <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank" class="hover:text-gray-200" title="Facebook">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
          <path d="M22,12A10,10,0,1,0,12,22V14H9v-3h3V8.5a3.5,3.5,0,0,1,3.75-3.5,15.35,15.35,0,0,1,2.25.19V8H16.5c-1.5,0-1.75.71-1.75,1.75V11H18l-.5,3H14.75v8A10,10,0,0,0,22,12Z"/>
        </svg>
      </a>
   <!-- Logo WhatsApp fonctionnel -->
<a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:text-gray-200" title="WhatsApp">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="white" viewBox="0 0 24 24">
      <path d="M12.04 2C6.55 2 2 6.52 2 12c0 2.12.63 4.09 1.81 5.78L2 22l4.36-1.75C8 21.3 10 22 12.05 22 17.54 22 22 17.48 22 12S17.54 2 12.04 2m0 18c-1.79 0-3.5-.52-4.98-1.5l-.36-.22-2.59 1.04.7-2.46-.26-.38A8 8 0 0 1 4 12c0-4.41 3.58-8 8.04-8 4.42 0 8 3.59 8 8s-3.58 8-8 8m4.43-5.53c-.24-.12-1.42-.7-1.64-.78-.22-.08-.38-.12-.54.12-.16.23-.62.77-.76.93-.14.15-.28.17-.52.05-.24-.12-1.01-.37-1.92-1.18-.71-.63-1.19-1.41-1.33-1.65-.14-.23-.01-.35.1-.47.1-.1.24-.27.36-.4.12-.13.16-.23.24-.39.08-.15.04-.29-.02-.41-.05-.12-.54-1.3-.74-1.77-.2-.48-.4-.41-.54-.42h-.46c-.15 0-.4.06-.61.29-.21.23-.8.78-.8 1.9 0 1.12.82 2.2.94 2.35.12.15 1.61 2.6 3.9 3.64.54.23.96.37 1.28.47.54.17 1.03.15 1.42.09.43-.06 1.42-.58 1.62-1.15.2-.57.2-1.06.14-1.15-.06-.09-.22-.15-.46-.27Z"/>
    </svg>
</a>


      <!-- Instagram -->
      <a href="https://www.instagram.com/abec.officiel/" target="_blank" class="hover:text-gray-200" title="Instagram">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
          <path d="M7.75,2A5.75,5.75,0,0,0,2,7.75v8.5A5.75,5.75,0,0,0,7.75,22h8.5A5.75,5.75,0,0,0,22,16.25v-8.5A5.75,5.75,0,0,0,16.25,2Zm8.5,1.5A4.25,4.25,0,0,1,20.5,7.75v8.5A4.25,4.25,0,0,1,16.25,20.5h-8.5A4.25,4.25,0,0,1,3.5,16.25v-8.5A4.25,4.25,0,0,1,7.75,3.5h8.5ZM12,7a5,5,0,1,0,5,5A5,5,0,0,0,12,7Zm0,1.5a3.5,3.5,0,1,1-3.5,3.5A3.5,3.5,0,0,1,12,8.5Zm5.25-.88a1.13,1.13,0,1,1-1.13,1.13A1.13,1.13,0,0,1,17.25,7.62Z"/>
        </svg>
      </a>

    </div>
                  <!-- Coordonnées de contact -->
  <div class="text-sm">
  Contact: 
  <a href="mailto:globaluniversalwelfare@gmail.com" class="underline hover:text-gray-200">
    globaluniversalwelfare@gmail.com
  </a>
</div>
              </div>
          </div>
      </nav>

  <!-- Nav Bar Principale -->
  <header class="bg-white shadow py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <!-- Logo -->
        <div class="flex-shrink-0">
   <img src="santos/image/logo.png" alt="Logo ABEC" class="w-20 md:w-13">
</div>

          
        <!-- Navigation Desktop -->
    
        <nav class="hidden md:flex space-x-4">
          <a href="#top" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Accueil</a>
          <a href="#about" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">À propos</a>
          <a href="#actions" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Nos Actions</a>
          <a href="#contact" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Contact</a>
          <a href="santos/branches.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200">Branches</a>
      <a href="santos/evenements.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200">Événement à Venir</a>
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
      <a href="#top" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200">Accueil</a>
      <a href="#about" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200">À propos</a>
      <a href="#actions" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200">Nos Actions</a>
      <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200">Contact</a>
      <a href="santos/branches.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200">Branches</a>
      <a href="santos/evenements.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200">Événement à Venir</a>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="relative bg-gradient-to-r from-primary to-secondary h-screen overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
      <div class="text-left" x-data="letterAnimation()" x-init="start()">
        <h1 class="text-5xl font-extrabold text-white sm:text-6xl relative inline-block">
          <span class="invisible">Soutenez L'ABEC</span>
          <span x-text="displayedText" class="absolute top-0 left-0"></span>
        </h1>
        <p class="mt-4 text-xl text-gray-100">
          Une ONG dédiée à l’aide humanitaire : dons essentiels pour hôpitaux et orphelinats.
        </p>
        <div class="mt-8">
          <a href="dons.php" class="inline-block bg-white text-primary px-8 py-3 font-medium rounded-md hover:bg-gray-100 transition transform hover:scale-105">
            Faites un don
          </a>
          <a href="#about" class="inline-block ml-4 bg-primary text-white px-8 py-3 font-medium rounded-md hover:bg-secondary transition transform hover:scale-105">
            En savoir plus
          </a>
        </div>
      </div>
    </div>
    <div class="absolute bottom-8 w-full flex justify-center">
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </div>
  </section>

  <!-- Section À propos -->
  <section id="about" class="py-16 bg-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl font-bold text-gray-900">À propos d'ABEC</h2>
      <p class="mt-4 text-gray-600 leading-relaxed">
        ABEC est une ONG humanitaire qui se consacre à soutenir les hôpitaux et orphelinats en fournissant des dons essentiels...
      </p>
    </div>
  </section>
    <!-- Section Nos Actions -->
  <section id="actions" class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl font-bold text-gray-900">Nos Actions</h2>
      <p class="mt-4 text-gray-700 leading-relaxed">
        Découvrez nos projets phares pour soutenir les hôpitaux et orphelinats. Nous mettons en œuvre divers programmes visant à améliorer l'accès aux soins et à offrir un environnement sûr et stimulant pour l'éducation des plus jeunes.
      </p>
      <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="bg-white p-4 rounded shadow">
          <h3 class="font-bold text-gray-800">Dons aux Hôpitaux</h3>
          <p class="text-gray-600 mt-2">
            Fourniture de matériel médical essentiel, formations pour le personnel et soutien aux infrastructures sanitaires dans les zones démunies.
          </p>
        </div>
        <div class="bg-white p-4 rounded shadow">
          <h3 class="font-bold text-gray-900">Soutien aux Orphelinats</h3>
          <p class="text-gray-600 mt-2">
            Dons alimentaires, éducatifs et matériels pour offrir un environnement chaleureux et bien équipé aux enfants en difficulté.
          </p>
        </div>
        <div class="bg-white p-4 rounded shadow">
          <h3 class="font-bold text-gray-900">Programmes Communautaires</h3>
          <p class="text-gray-600 mt-2">
            Initiatives pour sensibiliser aux enjeux de santé et d’éducation, ateliers communautaires et partenariats locaux pour un soutien durable.
          </p>
        </div>
        <div class="bg-white p-4 rounded shadow">
          <h3 class="font-bold text-gray-900">Campagnes de Sensibilisation</h3>
          <p class="text-gray-600 mt-2">
            Organisation d’événements et de campagnes pour impliquer directement les citoyens et promouvoir une approche collective face aux défis sociaux.
          </p>
        </div>
      </div>
      <p class="mt-8 text-gray-600 leading-relaxed">
        Chaque action, même petite, contribue à transformer des vies. Soutenez-nous et faites la différence dans la vie des plus démunis.
      </p>
    </div>
  </section>
  <!-- Footer -->
  <footer id="contact" class="bg-primary text-white" role="contentinfo">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
      <div class="flex flex-col items-left">
        <nav>
          <ul class="flex flex-col space-y-2 text-left">
            <li><a href="#top" class="text-sm hover:text-gray-200">Accueil</a></li>
            <li><a href="#about" class="text-sm hover:text-gray-200">À propos</a></li>
            <li><a href="#actions" class="text-sm hover:text-gray-200">Nos Actions</a></li>
            <li><a href="#contact" class="text-sm hover:text-gray-200">Contact</a></li>
          </ul>
        </nav>
        <a href="#top" class="mt-4 inline-block text-sm hover:text-gray-200">Retour en haut</a>
        <p class="text-sm mt-4">© 2025 ABEC - ONG Humanitaire. Tous droits réservés.</p>
      </div>
    </div>
  </footer>

  <!-- Animation texte -->
  <script>
    function letterAnimation() {
      return {
        text: "Soutenez L'ABEC",
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
  </script>
</body>
</html>
