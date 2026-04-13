import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                construction: {
                    yellow: '#FFCD00',
                    black: '#000000',
                    charcoal: '#111111',
                    gray: '#F5F5F7',
                }
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                'apple': '0 4px 12px rgba(0,0,0,0.05)',
                'heavy': '0 10px 30px rgba(0,0,0,0.15)',
            },
            borderRadius: {
                'apple': '18px',
            }
        },
    },

    plugins: [forms],
};
