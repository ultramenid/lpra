/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
      darkMode: 'class', // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                newgray: {
                    50: '#f9fafb',
                    100: '#f4f5f7',
                    200: '#e5e7eb',
                    300: '#d5d6d7',
                    400: '#9e9e9e',
                    500: '#707275',
                    600: '#4c4f52',
                    700: '#24262d',
                    800: '#1a1c23',
                    900: '#121317',
                    // default values from Tailwind UI palette
                    // '300': '#d2d6dc',
                    // '400': '#9fa6b2',
                    // '500': '#6b7280',
                    // '600': '#4b5563',
                    // '700': '#374151',
                    // '800': '#252f3f',
                    // '900': '#161e2e',
                  },
            },
            fontFamily: {
            'sans': ['Noto', ...defaultTheme.fontFamily.sans],
            'backend': ['Inconsolata'],
            },
            typography: {
                DEFAULT: {
                  css: {
                    '--tw-prose-counters': {
                        colors : '#e2e0d7',
                        },
                    '--tw-prose-bullets':{
                        colors : '#e2e0d7',
                        },
                    },
                }
            }

        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('tailwind-scrollbar-hide')
    ],
}

