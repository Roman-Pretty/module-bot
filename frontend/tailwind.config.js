/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
    daisyui: {
        themes: [
            {
                light: {
                    ...require("daisyui/src/theming/themes")["light"],
                    primary: "#0d3273",
                    secondary: "#0a2a63",
                },
            },'dark'
        ],
        darkTheme: "dark",
    },
    plugins: [
        require('daisyui'),
    ],
}
