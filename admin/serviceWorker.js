const staticDevCoffee = "Order"
const assets = [
  "../assets/js/main.js",
"../assets/css/main.css",
  "https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap",
  "menu.php",
  "../assets/img/menu/yongtaufoo/rm30-removebg-preview.webp",
  "../assets/img/menu/yongtaufoo/rm25-removebg-preview.webp",
  "../assets/img/menu/yongtaufoo/rm20-removebg-preview.webp",
  "../assets/img/menu/yongtaufoo/rm15-removebg-preview.webp",
  "../assets/img/menu/yongtaufoo/rm10-removebg-preview.webp",
  "../assets/img/menu/yongtaufoo/rm5-removebg-preview.webp",
  "../assets/img/menu/yongtaufoo/rm1-removebg-preview.webp",
  "../assets/img/menu/minuman/tembikai-removebg-preview.webp",
  "../assets/img/menu/minuman/teh_tarik-removebg-preview.webp",
  "../assets/img/menu/minuman/teh_o_panas-removebg-preview.webp",
  "../assets/img/menu/minuman/teh_o_ais-removebg-preview.webp",
  "../assets/img/menu/minuman/teh_ais-removebg-preview.webp",
  "../assets/img/menu/minuman/Sirap-Ais-RM2-removebg-preview.webp",
  "../assets/img/menu/minuman/oren-removebg-preview.webp",
  "../assets/img/menu/minuman/milo_panas-removebg-preview.webp",
  "../assets/img/menu/minuman/nescafe_panas-removebg-preview.webp",
  "../assets/img/menu/minuman/milo_ais-removebg-preview.webp",
  "../assets/img/menu/minuman/limau_panas-removebg-preview.webp",
  "../assets/img/menu/minuman/limau_asam_boi-removebg-preview.webp",
  "../assets/img/menu/minuman/limau_ais-removebg-preview.webp",
  "../assets/img/menu/minuman/laici-removebg-preview.webp",
  "../assets/img/menu/minuman/kopi_o_panas-removebg-preview.webp",
  "../assets/img/menu/minuman/kopi_o_ais-removebg-preview.webp",
  "../assets/img/menu/minuman/carrot-juice-removebg-preview.webp",
  "../assets/img/menu/minuman/apple-juice-removebg-preview.webp",
  "../assets/img/menu/makanan/mee goreng/mee_udang-removebg-preview.webp",
  "../assets/img/menu/makanan/mee goreng/mee_sup-removebg-preview.webp",
  "../assets/img/menu/makanan/mee goreng/mee_hailam-removebg-preview.webp",
  "../assets/img/menu/makanan/mee goreng/mee_goreng_mamak-removebg-preview.webp",
  "../assets/img/menu/makanan/mee goreng/mee_bandung-removebg-preview.webp",
  "../assets/img/menu/makanan/kuey teow/char_kuey_teow-removebg-preview.webp",
  "../assets/img/menu/makanan/kuey teow/kuey_teow_goreng-removebg-preview.webp",
  "../assets/img/menu/makanan/kuey teow/kuey_teow_sup-removebg-preview.webp",
  "../assets/img/menu/makanan/kuey teow/mee_hailam-removebg-preview-_1_-transformed-removebg-preview.webp",
  "../assets/img/menu/makanan/bihun goreng/bihun_goreng-removebg-preview.webp",
  "../assets/img/menu/makanan/bihun goreng/bihun_sup-removebg-preview.webp",
  "../assets/img/menu/makanan/nasi/nasi_goreng_cina-removebg-preview.webp",
  "../assets/img/menu/makanan/nasi/nasi_ayam_sedap-removebg-preview.webp",
  "../assets/img/menu/makanan/nasi/nasi_goreng_pataya-removebg-preview.webp",
  "../assets/img/menu/makanan/nasi/nasi_goreng_usa-removebg-preview.webp",
  "../assets/img/menu/makanan/nasi/nasi-goreng-ayam-removebg-preview.webp",
  "../assets/img/menu/makanan/nasi/Resepi-Nasi-Goreng-Kampung-removebg-preview.webp",
];

self.addEventListener("install", installEvent => {
  installEvent.waitUntil(
    caches.open(staticDevCoffee).then(cache => {
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
