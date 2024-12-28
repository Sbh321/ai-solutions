import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { ClientJS } from 'clientjs';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, DefineComponent, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        // Prevent visiting the same page (Does not work like in case of login)
        // router.on('before', (event) => {
        //     if (window.location.pathname === event.detail.visit.url.pathname) {
        //         event.preventDefault();
        //     }
        // });

        // Logic to generate and store device fingerprint
        const fingerprintKey = 'device_fingerprint';

        if (!localStorage.getItem(fingerprintKey)) {
            const client = new ClientJS();
            const fingerprint = client?.getFingerprint();

            localStorage.setItem(fingerprintKey, fingerprint);
        }

        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
