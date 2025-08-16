<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABEC - Santos - Branche Santé</title>
  <link rel="icon" type="image/png" href="santos.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            santosRed: '#D32F2F',
            santosWhite: '#FFFFFF',
            santosBlue: '#1976D2',
            santosGray: '#F5F5F5'
          }
        }
      }
    }
  </script>
  <style>
    [x-cloak] { display: none; }
    .hero-section { background: linear-gradient(135deg, #1976D2 0%, #D32F2F 100%); }
    .top-nav { background: linear-gradient(to right, #1976D2, #D32F2F); }
    nav a { transition: all 0.3s ease; }
    nav a:hover { transform: translateY(-2px); box-shadow: 0px 2px 8px rgba(0,0,0,0.15); }
    .media-card {
      border: none;
      overflow: hidden;
      border-radius: 0.75rem;
      background: linear-gradient(to bottom, #ffffff, #f9f9f9);
      transition: all 0.3s ease;
    }
    .media-card:hover { transform: translateY(-4px); box-shadow: 0 8px 20px rgba(0,0,0,0.12); }
    .like-button, .heart-button, .comment-button {
      display: inline-flex;
      align-items: center;
      padding: 8px 12px;
      margin-right: 8px;
      border-radius: 0.375rem;
      font-size: 0.875rem;
      transition: all 0.2s ease-in-out;
    }
    .like-button {
      background: linear-gradient(to right, #1976D2, #1565C0);
      color: #fff;
    }
    .like-button.liked { background: linear-gradient(to right, #0D47A1, #082f77); }
    .like-button:hover { background: linear-gradient(to right, #1565C0, #0D47A1); transform: scale(1.05); }
    .heart-button {
      background: linear-gradient(to right, #D32F2F, #B71C1C);
      color: #fff;
    }
    .heart-button.hearted { background: linear-gradient(to right, #880E4F, #6B0839); }
    .heart-button:hover { background: linear-gradient(to right, #B71C1C, #880E4F); transform: scale(1.05); }
    .comment-button {
      background: linear-gradient(to right, #4CAF50, #388E3C);
      color: #fff;
    }
    .comment-button:hover { background: linear-gradient(to right, #388E3C, #2E7D32); transform: scale(1.05); }
    footer { background: linear-gradient(to right, #D32F2F, #1976D2); }
  </style>
</head>
<body id="top" x-data="{ mobileMenuOpen: false }" class="bg-santosGray font-sans antialiased">

  <!-- Top Nav -->
<!-- Top Nav -->
<!-- Top Nav -->
  <nav class="top-nav text-white">
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
          <!-- WhatsApp -->
          <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank" class="hover:text-gray-200" title="WhatsApp">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="white" viewBox="0 0 24 24">
              <path d="M12.04 2C6.55 2 2 6.52 2 12c0 2.12.63 4.09 1.81 5.78L2 22l4.36-1.75C8 21.3 10 22 12.05 22 17.54 22 22 17.48 22 12S17.54 2 12.04 2m0 18c-1.79 0-3.5-.52-4.98-1.5l-.36-.22-2.59 1.04.7-2.46-.26-.38A8 8 0 0 1 4 12c0-4.41 3.58-8 8.04-8 4.42 0 8 3.59 8 8s-3.58 8-8 8m4.43-5.53c-.24-.12-1.42-.70-1.64-.78-.22-.08-.38-.12-.54.12-.16.23-.62.77-.76.93-.14.15-.28.17-.52.05-.24-.12-1.01-.37-1.92-1.18-.71-.63-1.19-1.41-1.33-1.65-.14-.23-.01-.35.1-.47.1-.1.24-.27.36-.40.12-.13.16-.23.24-.39.08-.15.04-.29-.02-.41-.05-.12-.54-1.3-.74-1.77-.2-.48-.40-.41-.54-.42h-.46c-.15 0-.40.06-.61.29-.21.23-.80.78-.80 1.90 0 1.12.82 2.20.94 2.35.12.15 1.61 2.60 3.90 3.64.54.23.96.37 1.28.47.54.17 1.03.15 1.42.09.43-.06 1.42-.58 1.62-1.15.20-.57.20-1.06.14-1.15-.06-.09-.22-.15-.46-.27Z"/>
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
          <img src="santos.png" alt="Logo ABEC" class="h-15 w-auto md:h-16">
        </div>
        <!-- Navigation Desktop -->
        <nav class="hidden md:flex space-x-4">
          <a href="#top" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Accueil</a>
          <a href="#about" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">À propos</a>
          <a href="#actions" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Nos Actions</a>
          <a href="#contact" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Contact</a>
          <a href="branches.html" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Branches</a>
          <a href="evenements.html" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Événement à Venir</a>
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
      <a href="branches.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200">Branches</a>
      <a href="evenements.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-gray-200">Événement à Venir</a>
    </div>
  </header>

  <!-- Hero -->
  <section class="relative hero-section h-screen overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
      <div class="text-left text-santosWhite">
        <h1 class="text-5xl font-extrabold sm:text-6xl">Santos - Branche Santé</h1>
        <p class="mt-4 text-xl">Découvrez les moments de nos événements.</p>
        <div class="mt-8">
          <a href="#media-section" class="inline-block bg-santosWhite text-santosBlue px-8 py-3 font-medium rounded-md hover:bg-santosGray transition transform hover:scale-105">
            Voir les Médias
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Médias -->
  <section id="media-section" class="py-12 bg-white" x-data="userGallery()" x-init="init()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl font-bold text-gray-800 mb-8">Galerie Média</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <template x-for="media in filteredMedia" :key="media.id">
          <div class="media-card shadow hover:shadow-lg transition">
            <template x-if="media.type === 'image'">
              <img :src="media.url" :alt="media.description" class="w-full h-56 object-cover">
            </template>
            <template x-if="media.type === 'video'">
              <video controls class="w-full h-56 object-cover">
                <source :src="media.url" type="video/mp4">
              </video>
            </template>
            <div class="p-4">
              <h3 class="text-lg font-semibold" x-text="media.title"></h3>
              <p class="text-sm text-gray-700 mb-4" x-text="media.description"></p>
              <div class="flex items-center mb-2">
                <button @click="toggleLike(media.id)" class="like-button" :class="{ 'liked': media.liked }" :title="media.liked ? 'Retirer le like' : 'Liker'">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 8h-5.25l1.38-5.52A2 2 0 0 0 14.16 0H10a2 2 0 0 0-1.94 1.5L4 14v8h7.75a2 2 0 0 0 1.94-1.5L16 14h5a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2zM6 14l4.06-12.5H14l-1.38 5.5H6v7H4v-8zm16 0h-5.75l-2.31 6.5H6v-2h7.75l2.31-6.5H22v2z"/>
                  </svg>
                  <span x-text="media.likes"></span>
                </button>
                <button @click="toggleHeart(media.id)" class="heart-button" :class="{ 'hearted': media.hearted }" :title="media.hearted ? 'Retirer le cœur' : 'Ajouter un cœur'">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                  </svg>
                  <span x-text="media.hearts"></span>
                </button>
                <button @click="media.showCommentForm = !media.showCommentForm" class="comment-button" :title="media.showCommentForm ? 'Fermer le formulaire' : 'Commenter'">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 6h-2V5a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v1H3a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h6.59l3.71 3.71A1 1 0 0 0 14 23a1 1 0 0 0 .71-.29l3.71-3.71H21a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2zm0 11h-3.59l-3.71 3.71-3.71-3.71H3V8h18v9zM17 5V4a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v1h10z"/>
                  </svg>
                  <span x-text="media.comment_count"></span>
                </button>
              </div>
              <!-- Section Commentaires -->
              <div x-show="media.showCommentForm" x-cloak class="mt-4">
                <form @submit.prevent="addComment(media.id, $event.target.comment.value); $event.target.comment.value = ''">
                  <input type="text" name="comment" placeholder="Ajouter un commentaire..." class="w-full border p-2 rounded mb-2 focus:border-santosBlue focus:ring-santosBlue">
                  <button type="submit" class="bg-santosBlue text-white px-4 py-1 rounded hover:bg-santosRed">Envoyer</button>
                </form>
              </div>
              <div class="mt-2">
                <template x-for="comment in media.comments" :key="comment.id">
                  <p class="text-sm text-gray-600 mb-1" x-text="comment.text"></p>
                </template>
              </div>
            </div>
          </div>
        </template>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="contact" class="text-santosWhite">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
      <div class="flex flex-col items-left">
        <nav>
          <ul class="flex flex-col space-y-2 text-left">
            <li><a href="index.php" class="text-sm hover:text-santosRed">Accueil</a></li>
            <li><a href="dons.php" class="text-sm hover:text-santosRed">Dons</a></li>
            <li><a href="evenements.html" class="text-sm hover:text-santosRed">Événements</a></li>
            <li><a href="branches.html" class="text-sm hover:text-santosRed">Branches</a></li>
          </ul>
        </nav>
        <a href="#top" class="mt-4 inline-block text-sm hover:text-santosRed">Retour en haut</a>
        <p class="text-sm mt-4">© 2025 ABEC - ONG Humanitaire. Tous droits réservés.</p>
      </div>
    </div>
  </footer>

  <!-- Script Alpine.js -->
  <script>
    function userGallery() {
      return {
        selectedBranch: 'Santé',
        mediaList: [],
        filteredMedia: [],
        async init() {
          try {
            const res = await fetch('get_media.php');
            this.mediaList = await res.json();
            this.filterMedia();
            // Incrémenter les vues pour chaque média chargé
            this.mediaList.forEach(media => this.incrementView(media.id));
          } catch (err) {
            console.error('Erreur chargement médias', err);
          }
        },
        filterMedia() {
          this.filteredMedia = this.mediaList.map(media => ({
            ...media,
            liked: false, // État initial
            hearted: false, // État initial
            showCommentForm: false, // État pour afficher/masquer le formulaire
            comments: media.comments || [] // Assurer que comments est un tableau
          }));
        },
        async toggleLike(id) {
          try {
            const media = this.filteredMedia.find(m => m.id === id);
            const action = media.liked ? 'unlike' : 'like';
            const res = await fetch('like_media.php', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ id, action })
            });
            const updated = await res.json();
            this.updateMedia(updated);
            media.liked = !media.liked;
          } catch (err) {
            console.error('Erreur like', err);
          }
        },
        async toggleHeart(id) {
          try {
            const media = this.filteredMedia.find(m => m.id === id);
            const action = media.hearted ? 'unheart' : 'heart';
            const res = await fetch('heart_media.php', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ id, action })
            });
            const updated = await res.json();
            this.updateMedia(updated);
            media.hearted = !media.hearted;
          } catch (err) {
            console.error('Erreur heart', err);
          }
        },
        async incrementView(id) {
          try {
            const res = await fetch('increment_view.php', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ id })
            });
            const updated = await res.json();
            this.updateMedia(updated);
          } catch (err) {
            console.error('Erreur view', err);
          }
        },
        async addComment(id, text) {
          if (!text.trim()) return;
          try {
            const res = await fetch('add_comment.php', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ media_id: id, text })
            });
            const updated = await res.json();
            this.updateMedia(updated);
          } catch (err) {
            console.error('Erreur commentaire', err);
          }
        },
        updateMedia(updated) {
          const index = this.mediaList.findIndex(m => m.id === updated.id);
          if (index !== -1) {
            this.mediaList[index] = updated;
            this.filterMedia();
          }
        }
      };
    }
  </script>
</body>
</html>