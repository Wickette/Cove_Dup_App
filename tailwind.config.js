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
            colors: {
                cove: {
                    bg: "var(--cove-bg)",
                    surface: "var(--cove-surface)",
                    "surface-2": "var(--cove-surface-2)",
                    ink: "var(--cove-ink)",
                    "ink-muted": "var(--cove-ink-muted)",
                    gold: "var(--cove-gold)",
                    "gold-ink": "var(--cove-gold-ink)",
                    teal: "var(--cove-teal)",
                    border: "var(--cove-border)",
                },
            },
            fontFamily: {
                sans: ["Work Sans", ...defaultTheme.fontFamily.sans],
                serif: ["Fraunces", ...defaultTheme.fontFamily.serif],
            },
        },
    },

    plugins: [forms],
};
