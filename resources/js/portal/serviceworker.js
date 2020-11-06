// const VERSION = "lspadmin-sw-v3";
// const RUNTIME = "RUNTIME";
// const channel = new BroadcastChannel("sw-messages");

// const precacheUrls = ["css/app.css", "js/app.js"];

// // install handler, precaching resources
// self.addEventListener("install", event => {
//     event.waitUntil(
//         caches
//             .open(VERSION)
//             .then(cache => cache.addAll(precacheUrls))
//             .then(self.skipWaiting())
//     );
// });

// // activate handler, cleaning up old cache
// self.addEventListener("activate", event => {
//     const currentCaches = [VERSION, RUNTIME];
//     event.waitUntil(
//         caches
//             .keys()
//             .then(cacheNames => {
//                 return cacheNames.filter(
//                     cacheName => !currentCaches.includes(cacheName)
//                 );
//             })
//             .then(cachesToDelete => {
//                 return Promise.all(
//                     cachesToDelete.map(cacheToDelete => {
//                         return caches.delete(cacheToDelete);
//                     })
//                 );
//             })
//             .then(() => self.clients.claim())
//     );
// });

// // fetch handler, handling fetch same-origins resources from a cache.
// // if no response, it populate RUNTIME cache with response from network before returning to page
// self.addEventListener("fetch", event => {
//     const destination = event.request.destination;

//     if (event.request.url.match("^.*(/admin).*$")) {
//         return false;
//     }
//     if (event.request.method !== "GET") {
//         return;
//     }
//     // skip cross-origin requests,
//     if (event.request.url.startsWith(self.location.origin)) {
//         switch (destination) {
//             case "style":
//             case "font":
//             case "script":
//                 event.respondWith(
//                     caches.match(event.request).then(cachedResponse => {
//                         if (cachedResponse) {
//                             return cachedResponse;
//                         }
//                         return caches.open(RUNTIME).then(cache => {
//                             return fetch(event.request).then(response => {
//                                 // put copy of response in the runtime cache -> harus clone ya
//                                 return cache
//                                     .put(event.request, response.clone())
//                                     .then(() => {
//                                         return response;
//                                     });
//                             });
//                         });
//                     })
//                 );
//                 break;
//             default:
//                 event.respondWith(
//                     fetch(event.request)
//                         .then(response => {
//                             // put copy of response in the runtime cache -> harus clone ya
//                             return caches.open(RUNTIME).then(cache => {
//                                 return cache
//                                     .put(event.request, response.clone())
//                                     .then(() => {
//                                         return response;
//                                     });
//                             });
//                         })
//                         .catch(e => {
//                             channel.postMessage("offline");
//                             return caches
//                                 .match(event.request)
//                                 .then(cachedResponse => {
//                                     if (cachedResponse) {
//                                         return cachedResponse;
//                                     } else return e;
//                                 });
//                         })
//                 );
//                 break;
//         }
//     }
// });
