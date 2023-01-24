/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            backgroundColor: {
                "btn-danger": "#f44336",
                "btn-success": "#4caf50",
            },
            textColor: {
                "btn-danger": "#fff",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
