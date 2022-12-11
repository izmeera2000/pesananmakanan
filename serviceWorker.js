const staticDevCoffee = "dev-coffee-site-v1"
const assets = [
  
  "/index.php",
  "/assets/css/style.css",
  "/assets/js/main.js"
];

self.addEventListener("install", installEvent => {
    installEvent.waitUntil(
      caches.open(staticHMS).then(cache => {
        cache.addAll(assets);
      })
    );
  });
  
  self.addEventListener("fetch", fetchEvent => {
    fetchEvent.respondWith(
      caches.match(fetchEvent.request).then(res => {
        return res || fetch(fetchEvent.request);
      })
    );
  });
  