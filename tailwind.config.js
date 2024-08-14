/** @type {import('tailwindcss').Config} */
export default {
    // darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            'pt-sans': ['PT Sans', 'regular']
        },
        extend: {},
    },
    plugins: [],
}
