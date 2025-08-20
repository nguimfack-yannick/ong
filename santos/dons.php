<?php
  // Inclure le fichier de connexion à la base de données
  require_once 'database.php';

  // Récupérer les branches depuis la table branches
  try {
    $stmt = $conn->query("SELECT nom FROM branches ORDER BY nom");
    $branches = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // die('kk');
  } catch (PDOException $e) {
    $error = 'Erreur lors de la récupération des branches : ' . $e->getMessage();
  }
  ?>

  <!DOCTYPE html>
  <html lang="fr">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>ABEC - Faire un Don</title>
       <!-- Favicon -->
  <!-- <link rel="icon" type="image/png" href="logo.png"> -->
   <link rel="icon" type="image/png" sizes="64x64" href="image/logo.png">

      <!-- Tailwind CSS CDN -->
      <script src="https://cdn.tailwindcss.com"></script>
      <!-- Optionnel : police d’écriture Inter -->
      <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
      <script>
      tailwind.config = {
          theme: {
              extend: {
                  colors: {
                      primary: '#1E90FF',
                      /* Bleu principal */
                      secondary: '#87CEFA' /* Bleu plus clair */
                  }
              }
          }
      }
      </script>

      <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

  </head>

  <body id="top" class="bg-white font-sans antialiased">
      <!-- Top Nav Bar Bleu avec icônes et coordonnées -->
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
                      <span>Contact: contact@universalwelfare.org</span>
                  </div>
              </div>
          </div>
      </nav>



      <!-- Nav Bar Principale (Blanche) -->
      <header class="bg-white shadow py-4">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="flex items-center justify-between h-16">
                  <!-- Titre -->
                  
                  <div class="flex-shrink-0 w-2/12 h-auto">
                      <img src="image/logo.png" alt="logo" class="md:w-5/12">
                  </div>
                  <!-- Navigation Desktop -->
                  <nav class="flex space-x-4">
                      <a href="index.php"
                          class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Accueil</a>
                      <!-- <a href="apropos.html" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">À
                          propos</a> -->
                      <!-- <a href="#Actions" class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Nos
                          Actions</a> -->
                      <!-- <a href="contact.html"
                          class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Contact</a> -->
                      <a href="branches.html"
                          class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Branches</a>
                      <a href="evenements.html"
                          class="px-3 py-2 rounded-md text-sm text-gray-800 hover:bg-gray-200">Événement à Venir</a>
                  </nav>
              </div>
          </div>
      </header>

      <!-- Hero Section pour les Dons -->
      <section class="relative bg-gradient-to-r from-primary to-secondary h-screen overflow-hidden">
          <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
              <div class="text-left">
                  <h1 class="text-5xl font-extrabold text-white sm:text-6xl">Faites un Don</h1>
                  <p class="mt-4 text-xl text-gray-100">
                      Soutenez nos missions humanitaires pour changer des vies.
                  </p>
                  <div class="mt-8">
                      <a href="#donation-form"
                          class="inline-block bg-white text-primary px-8 py-3 font-medium rounded-md hover:bg-gray-100 transition transform hover:scale-105">
                          Donnez maintenant
                      </a>
                      <a href="#donation-info"
                          class="inline-block ml-4 bg-primary text-white px-8 py-3 font-medium rounded-md hover:bg-secondary transition transform hover:scale-105">
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

      <!-- Section Informations sur les Dons -->
      <section id="donation-info" class="py-16 bg-gray-200">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <h2 class="text-3xl font-bold text-gray-900">Pourquoi Donner à ABEC ?</h2>
              <p class="mt-4 text-gray-600 leading-relaxed">
                  Votre générosité permet de fournir des ressources vitales aux hôpitaux et orphelinats. Chaque don,
                  qu’il soit grand ou petit, contribue à améliorer la qualité de vie des personnes dans le besoin.
              </p>
              <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
                  <div class="bg-white p-4 rounded shadow">
                      <h3 class="font-bold text-gray-800">Impact de Votre Don</h3>
                      <p class="text-gray-600 mt-2">
                          Un don de 10 € peut offrir un repas à un enfant, tandis qu’un don de 50 € peut fournir du
                          matériel médical essentiel.
                      </p>
                  </div>
                  <div class="bg-white p-4 rounded shadow">
                      <h3 class="font-bold text-gray-900">Sécurité et Transparence</h3>
                      <p class="text-gray-600 mt-2">
                          Vos dons sont gérés avec transparence et utilisés directement pour nos projets humanitaires.
                      </p>
                  </div>
              </div>
          </div>
      </section>
      <script>
      setTimeout(function() {
          const message = document.getElementById('success_message');
          if (message) {
              message.style.display = 'none';
          }
      }, 5000);
      </script>
      <!-- Section Formulaire de Don -->
      <section id="donation-form" class="py-16 bg-gray-100">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
              <h2 class="text-3xl font-bold text-gray-900">Faites Votre Don</h2>
              <?php if (isset($_GET['error'])): ?>
              <div id="error_message" class=" mt-4 p-4 rounded-md bg-red-100 text-red-800">
                  <p><?php echo htmlspecialchars($_GET['error']); ?></p>
              </div>
              <?php endif; ?>
              <?php if (isset($_GET['success'])): ?>
              <div id="success_message" class=" mt-4 p-4 rounded-md bg-green-100 text-green-800">
                  <p><?php echo htmlspecialchars($_GET['success']); ?></p>
              </div>
              <?php endif; ?>
              <form action="./backend.php" method="POST" id="form" class="mt-8 max-w-lg mx-auto">

                  <div class="mb-4">
                      <label for="nature" class="block text-gray-700 text-sm font-bold mb-2">Nature des dons</label>
                      <select id="nature" name="nature"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                          <option value="">Sélectionner la nature du don</option>
                          <option value="Financier">Financier</option>
                          <option value="Matériel">Matériel</option>
                          <option value="Bénévole">Bénévole</option>
                      </select>
                  </div>
                  <div class="mb-4">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="pays">
                          Sélectionnez un pays
                      </label>
                      <select id="pays" name="country_currency"
                          class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                          <option value="CM|XAF">Cameroun (XAF)</option>
                          <option value="BJ|XOF">Bénin (XOF)</option>
                          <option value="CI|XOF">Côte d'Ivoire (XOF)</option>
                          <option value="RW|RWF">Rwanda (RWF)</option>
                          <option value="UG|UGX">Ouganda (UGX)</option>
                          <option value="KE|KES">Kenya (KES)</option>
                      </select>
                  </div>
                  <div class="mb-4">
                      <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Numéro de téléphone</label>
                      <input type="tel" id="phone" name="phone"
                          class="shadow border rounded w-full py-2 px-3 text-gray-700" placeholder="Ex: 696123456">
                  </div>
                  <div class="mb-4">
                      <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Montant (en €, si
                          financier)</label>
                      <input type="number" id="amount" name="amount" min="5"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          placeholder="Entrez un montant">
                  </div>
                  <div class="mb-4">
                      <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom (ou Anonyme)</label>
                      <input type="text" id="name" name="name"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          placeholder="Votre nom ou Anonyme">
                  </div>
                  <div class="mb-4">
                      <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                      <input type="email" id="email" name="email"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          placeholder="Votre email">
                  </div>
                  <div class="mb-4">
                      <label for="branch" class="block text-gray-700 text-sm font-bold mb-2">Branche</label>
                      <select id="branch" name="branch"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                          <option value="">Sélectionner une branche</option>
                          <?php foreach ($branches as $branch): ?>
                          <option value="<?php echo htmlspecialchars($branch['nom']); ?>">
                              <?php echo htmlspecialchars($branch['nom']); ?></option>
                          <?php endforeach; ?>
                      </select>
                      <div class="mb-4">
                          <label for="service" class="block text-gray-700 text-sm font-bold mb-2">Opérateur</label>
                          <select id="service" name="service"
                              class="shadow border rounded w-full py-2 px-3 text-gray-700">
                              <option value="">Choisissez un opérateur</option>
                              <option value="ORANGE">Orange</option>
                              <option value="MTN">MTN</option>
                          </select>
                      </div>
                  </div>
                  <div class="mb-4">
                      <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Commentaire
                          (facultatif)</label>
                      <textarea id="comment" name="comment"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                          placeholder="Ex. : Don pour la campagne de santé"></textarea>
                  </div>

                  <button type="submit" disabled
                      class="bg-primary text-white px-6 py-3 rounded-md hover:bg-secondary transition transform hover:scale-105">
                      Soumettre le Don

                  </button>
                  <!-- <i class="fas fa-spin "></i>  -->
              </form>
              <p class="mt-4 text-gray-600 text-center">
                  Merci de votre soutien ! Vous recevrez une confirmation par email une fois votre don reçu.
              </p>
          </div>
      </section>

      <!-- Footer -->
      <footer id="contact" class="bg-primary text-white" role="contentinfo">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
              <div class="flex flex-col items-left">
                  <nav>
                      <ul class="flex flex-col space-y-2 text-left">
                          <li><a href="index.php" class="text-sm hover:text-gray-200">Accueil</a></li>
                          <li><a href="apropos.html" class="text-sm hover:text-gray-200">À propos</a></li>
                          <li><a href="nosactions.html" class="text-sm hover:text-gray-200">Nos Actions</a></li>
                          <li><a href="contact.html" class="text-sm hover:text-gray-200">Contact</a></li>
                      </ul>
                  </nav>
                  <a href="#top" class="mt-4 inline-block text-sm hover:text-gray-200">Retour en haut</a>
                  <p class="text-sm mt-4">© 2025 ABEC - ONG Humanitaire. Tous droits réservés.</p>
              </div>
          </div>
      </footer>
  </body>

  </html>



  <script>
(function() {
    emailjs.init('l5f3IMXSdloKUBARV'); // Clé publique EmailJS
})();

const form = document.getElementById('form');
const loading = false;
form.addEventListener('submit', function(e) {
    e.preventDefault(); // Empêche le rechargement de la page
loading = true; // Indique que le chargement est en cours
    const formData = new FormData(form);


    // Envoi au backend PHP
    fetch('./backend.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Envoi de l'email avec EmailJS

                const templateParams = {
                    amount: form.amount.value,
                    from_name: form.name.value,
                    email: form.email.value,
                    date: new Date().toLocaleDateString("fr-FR"),
                };

                emailjs.send('service_5p1hap8', 'template_wsqhui9', templateParams)
                    .then(resp => {
                        alert('Don enregistré et email envoyé avec succès !');
                        form.reset(); // Réinitialiser le formulaire
                    })
                    .catch(err => {
                        console.error('Erreur EmailJS:', err);
                        alert(
                            'Don enregistré mais une erreur est survenue lors de l’envoi de l’email.'
                        );
                    });
            } else {
                alert('Erreur : ' + result.message);
            }
        })
        .catch(error => {
            console.error('Erreur lors de la requête fetch:', error);
            alert('Une erreur est survenue. Veuillez réessayer.');
        })
        .finally{
          loading = false;
        };
});
  </script>