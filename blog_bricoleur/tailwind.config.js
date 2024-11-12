import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import animations from 'tailwindcss-animate'; // Assure-toi que c'est importé




/** @type {import('tailwindcss').Config} */
export default {
    content: [

        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        // Ajoute ici d'autres fichiers, si tu as besoin
        './resources/js/**/*.vue', // Si tu utilises Vue.js
        './resources/**/*.js',      // Pour les fichiers JS généraux
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // Ici tu peux ajouter d'autres extensions de thème si nécessaire
        },
    },

    plugins: [forms],
    plugins: [forms, animations], // Ajoute ici le plugin
};
