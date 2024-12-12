/** @type {import('tailwindcss').Config} */
module.exports = {
    purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors: {
            qm: "#0d3273"
        },
        extend: {},
    },
    daisyui: {
        themes: [
            {
                light: {
                    ...require("daisyui/src/theming/themes")["light"],
                    primary: "#0d3273",
                    secondary: "#0a2a63",
                },
            },
        ],
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('daisyui'),
    ],
}
