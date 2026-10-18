const NOMBRE_CACHE = 'redpon-v1.0';

self.addEventListener('install', e => {
    e.waitUntil(caches.open(NOMBRE_CACHE));
    self.skipWaiting();
});

self.addEventListener('activate', e => {
    e.waitUntil(
        caches.keys().then(nombres => 
            Promise.all(nombres.filter(n => n !== NOMBRE_CACHE).map(c => caches.delete(c)))
        )
    );
    self.clients.claim();
});

self.addEventListener('fetch', e => {
    e.respondWith(
        fetch(e.request).catch(() => caches.match(e.request))
    );
});