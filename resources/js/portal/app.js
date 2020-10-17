window._ = require('lodash');

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });


try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");

    require("bootstrap");
} catch (e) {}

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.axios.interceptors.request.use(function(config) {
    const token = $('meta[name="csrf-token"]').attr("content");
    config.headers.common["X-CSRF-TOKEN"] = token;
    return config;
});


// if ("serviceWorker" in navigator) {
//     console.log("registering sw");
//     navigator.serviceWorker.register("sw.js");
// } else {
//     console.log("sw not found in navigator");
// }

// const channel = new BroadcastChannel("sw-messages");
// let isOnline = true;
// channel.addEventListener("message", event => {
//     console.log("Received", event.data);
//     if (isOnline && event.data == "offline") {
//         isOnline = false;
//         alert("You now offline");
//     }
// });
