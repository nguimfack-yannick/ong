<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard ABEC - Gestion Médias</title>
  <link rel="icon" type="image/png" href="santos.jpg">
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
    body { background: #F5F5F5; }
    .top-nav { background: linear-gradient(to right, #1976D2, #D32F2F); }
    .submit-button {
      background: linear-gradient(to right, #1976D2, #D32F2F);
      color: white;
      padding: 0.75rem 1.5rem;
      border-radius: 0.375rem;
      transition: all 0.3s ease;
    }
    .submit-button:hover { transform: scale(1.05); }
    .form-container, .stats-container, .media-container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 2rem;
      background: white;
      border-radius: 0.75rem;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }
    .form-container:hover, .stats-container:hover, .media-container:hover { box-shadow: 0 8px 20px rgba(0,0,0,0.12); }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #e5e7eb; }
    th { background: linear-gradient(to right, #1976D2, #D32F2F); color: white; }
    .media-card {
      border: none;
      overflow: hidden;
      border-radius: 0.75rem;
      background: linear-gradient(to bottom, #ffffff, #f9f9f9);
      transition: all 0.3s ease;
    }
    .media-card:hover { transform: translateY(-4px); box-shadow: 0 8px 20px rgba(0,0,0,0.12); }
    footer { background: linear-gradient(to right, #D32F2F, #1976D2); }
  </style>
</head>
<body class="font-sans antialiased" x-data="{ mobileMenuOpen: false, ...dashboard() }" x-init="init()">

  <!-- Top Nav -->
  <nav class="top-nav text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex-shrink-0 w-2/12 h-auto">
          <img src="santos.png" alt="logo" class="md:w-5/12">
        </div>
        <div class="flex items-center space-x-4">
          <h1 class="text-xl font-bold">Dashboard - Gestion Médias</h1>
          <a href="santos.php" class="text-white hover:underline">Retour à Santos</a>
        </div>
        <div class="md:hidden">
          <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white focus:outline-none">
            <svg x-show="!mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
      </div>
      <div x-show="mobileMenuOpen" x-cloak class="md:hidden">
        <nav class="px-2 pt-2 pb-3 space-y-1 bg-santosWhite">
          <a href="santos.php" class="block px-3 py-2 text-gray-800 hover:bg-santosGray hover:text-santosBlue">Retour à Santos</a>
        </nav>
      </div>
    </div>
  </nav>

  <!-- Section Statistiques -->
  <section class="py-8">
    <div class="stats-container">
      <h2 class="text-2xl font-bold mb-6 text-gray-800">Statistiques des Médias</h2>
      <div class="overflow-x-auto">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Type</th>
              <th>Titre</th>
              <th>Description</th>
              <th>Likes</th>
              <th>Hearts</th>
              <th>Vues</th>
              <th>Commentaires</th>
            </tr>
          </thead>
          <tbody>
            <template x-for="media in mediaList" :key="media.id">
              <tr>
                <td x-text="media.id"></td>
                <td x-text="media.type"></td>
                <td x-text="media.title"></td>
                <td x-text="media.description.length > 50 ? media.description.substring(0, 50) + '...' : media.description"></td>
                <td x-text="media.likes"></td>
                <td x-text="media.hearts"></td>
                <td x-text="media.views"></td>
                <td x-text="media.comment_count"></td>
              </tr>
            </template>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Section Créer Post -->
  <section class="py-8">
    <div class="form-container">
      <h2 class="text-2xl font-bold mb-6 text-gray-800">Créer un Post</h2>
      <form id="postForm" action="create_post.php" method="POST" enctype="multipart/form-data">
        <div class="mb-4">
          <label for="postTitle" class="block text-sm font-medium text-gray-700">Titre</label>
          <input type="text" id="postTitle" name="title" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-santosBlue focus:ring-santosBlue">
        </div>
        <div class="mb-4">
          <label for="postContent" class="block text-sm font-medium text-gray-700">Description</label>
          <textarea id="postContent" name="description" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-santosBlue focus:ring-santosBlue"></textarea>
        </div>
        <div class="mb-4">
          <label for="postMedia" class="block text-sm font-medium text-gray-700">Fichier (Image ou Vidéo)</label>
          <input type="file" id="postMedia" name="media" accept="image/*,video/*" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-santosBlue focus:ring-santosBlue">
        </div>
        <input type="hidden" name="branch" value="Santé">
        <button type="submit" class="submit-button">Créer le Post</button>
      </form>
    </div>
  </section>

  <!-- Section Médias Récents -->
  <section class="py-8">
    <div class="media-container">
      <h2 class="text-2xl font-bold mb-6 text-gray-800">Médias Récents</h2>
      <div id="recentMedia" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <template x-for="media in mediaList" :key="media.id">
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
            </div>
          </div>
        </template>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-santosWhite">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center">
      <p class="text-sm">© 2025 ABEC - ONG Humanitaire. Tous droits réservés.</p>
    </div>
  </footer>

  <!-- Script Alpine.js -->
  <script>
    function dashboard() {
      return {
        mediaList: [],
        async init() {
          try {
            const res = await fetch('get_media.php');
            this.mediaList = await res.json();
          } catch (err) {
            console.error('Erreur chargement médias', err);
          }
        }
      };
    }
  </script>
</body>
</html>
