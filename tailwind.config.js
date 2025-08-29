import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
// Importe o plugin do Flowbite
import flowbite from 'flowbite/plugin';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        // Seus caminhos existentes
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

        // ADICIONE O CAMINHO DO FLOWBITE AQUI
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,

        // ADICIONE O PLUGIN DO FLOWBITE AQUI
        flowbite
    ],
};
