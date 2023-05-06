const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        // extend: {
        //     fontFamily: {
        //         sans: ['Figtree', ...defaultTheme.fontFamily.sans],
        //     },
        // },
        extend: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                main_color_1: '#F0E2C5',
            },
            screens: {
                'sm': {'max': '767px'},
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
