import $ from 'jquery';
window.$ = $;
import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     // wssPort: 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
//     encryption: true,
//     cluster:import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'ap2',
//     wsHost: window.location.hostname,
//     wsPort: 6001,
//     authEndpoint: '/broadcasting/custom-auth'

// });

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: window.location.hostname,
//     wsPort: 6001,
//     forceTLS: false,
//     disableStats: true,
//     cluster:import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'ap2',
//      authEndpoint: '/broadcasting/custom-auth'
// });

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_ABLY_PUBLIC_KEY,
    // enabledTransports: ['ws', 'wss'],
    wsHost: 'realtime-pusher.ably.io',
    wsPort: 443,
    disableStats: true,
    encrypted: false,
    forceTLS: false,
    cluster:import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'ap2',
});

window.Echo.private('App.Models.User.7')
    .notification((notification) => {
        console.log(notification.type);
    });

window.Echo.private(`App.Models.User.7`)
    .notification((notification) => {
        console.log(notification.type);
    });

window.Echo.private(`users.7`)
    .notification((notification) => {
        console.log(notification.type);
    });


   window.Echo.channel(`application`)
        .listen('ApplicationReplied', (e) => {
            console.log(e.application);
        });
  