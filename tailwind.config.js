import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                spinAround: {
                    "0%": { transform: "rotate(0deg)" },
                    "100%": {
                        transform: "rotate(180deg)",
                    },
                },
            },
            colors: {
                "custom-gray": "#6b7280",
                "custom-beige": "#fef9c3",
                "custom-brown": "#872c2c",
            },
        },
    },

    plugins: [forms, typography],
};
