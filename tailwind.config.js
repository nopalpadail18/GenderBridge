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
            },
            colors: {
                "gender-purple": "#8B5CF6",
                "gender-pink": "#EC4899",
                "gender-blue": "#3B82F6",
                "biru": "#63C8FF",
                "pink": "#FF2DD1",
            },
        },
    },

    plugins: [forms],
};
