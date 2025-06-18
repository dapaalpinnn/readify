import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                pro: [
                    "SF Pro Display",
                    "SF Pro Icons",
                    "Helvetica",
                    "Arial",
                    "sans-serif",
                ],
                breilga: ["Breilga", "serif"],
                jomolhari: ["Jomolhari", "serif"],
            },
        },
    },

    plugins: [forms],
};
