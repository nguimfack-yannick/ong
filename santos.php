<?php
// Connexion à la base MySQL
$pdo = new PDO("mysql:host=localhost;dbname=abec_dons;charset=utf8", "root", "");

// Récupération des médias pour la page Santos
$stmt = $pdo->query("SELECT * FROM media WHERE page = 'santos' ORDER BY id DESC");
$mediaList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABEC - Santos - Branche Santé</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100">

<!-- Galerie -->
<section class="py-12 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold mb-8">Galerie Santos</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($mediaList as $media): ?>
        <div class="bg-gray-100 rounded-lg overflow-hidden shadow">
          <?php if ($media['type'] === 'image'): ?>
            <img src="<?= htmlspecialchars($media['url']) ?>" alt="<?= htmlspecialchars($media['description']) ?>" class="w-full h-56 object-cover">
          <?php else: ?>
            <video controls class="w-full h-56 object-cover">
              <source src="<?= htmlspecialchars($media['url']) ?>" type="video/mp4">
            </video>
          <?php endif; ?>
          <div class="p-4">
            <p class="text-sm text-gray-700 mb-4"><?= htmlspecialchars($media['description']) ?></p>
            <div class="flex items-center">
              <button onclick="updateLike(<?= $media['id'] ?>)" class="bg-blue-600 hover:bg-blue-800 text-white px-3 py-1 rounded mr-2">
                👍 <span id="likes-<?= $media['id'] ?>"><?= $media['likes'] ?></span>
              </button>
              <button onclick="updateHeart(<?= $media['id'] ?>)" class="bg-red-600 hover:bg-red-800 text-white px-3 py-1 rounded">
                ❤️ <span id="hearts-<?= $media['id'] ?>"><?= $media['hearts'] ?></span>
              </button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script>
function updateLike(id) {
  fetch("update.php", {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    body: "id=" + id + "&action=like"
  })
  .then(res => res.json())
  .then(data => {
    document.getElementById("likes-" + id).innerText = data.likes;
  });
}

function updateHeart(id) {
  fetch("update.php", {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    body: "id=" + id + "&action=heart"
  })
  .then(res => res.json())
  .then(data => {
    document.getElementById("hearts-" + id).innerText = data.hearts;
  });
}
</script>

</body>
</html>
