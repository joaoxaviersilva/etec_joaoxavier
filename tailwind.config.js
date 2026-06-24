import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    // Define quais arquivos o Tailwind deve escanear para encontrar classes CSS utilizadas
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        // O bloco 'extend' adiciona novas configurações sem apagar as cores/fontes padrão do Tailwind
        extend: {
            // Mantém a fonte Figtree padrão do Breeze combinada com as fontes sem-serifa do sistema
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // Customização da paleta de cores baseada na imagem 'image_d6dc62.jpg' para o tema da ETEC
            colors: {
                'burgundy-beige': '#F2E5C6',   // Tom creme/bege claro para fundos secundários ou textos
                'burgundy-gold': '#F2D9A0',    // Destaques, bordas ou botões em ouro envelhecido
                'burgundy-normal': '#75162D',  // Cor principal (Bordô) para botões, links e títulos
                'burgundy-maroon': '#560B18',  // Variação mais escura para estados de hover e detalhes
                'burgundy-wine': '#3B010B',    // Vinho profundo para textos escuros, rodapés ou menus superiores
            }
        },
    },

    // Ativa o plugin de formulários para garantir que inputs e checkboxes fiquem fáceis de estilizar
    plugins: [forms],
};