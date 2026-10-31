/**
 * Satu-satunya sumber warna & font brand TAN Logistic.
 * Di-load oleh Tailwind v4 lewat directive `@config` di resources/css/app.css.
 *
 * @type {import('tailwindcss').Config}
 */
export default {
    theme: {
        extend: {
            colors: {
                // Overlay hero, footer, section gelap
                primary: {
                    DEFAULT: '#8B1212',
                    light: '#A51818',
                    dark: '#5F0B0B',
                    deep: '#3B0606',
                },
                // Tombol, kartu highlight, tag
                accent: {
                    DEFAULT: '#B91C1C',
                    light: '#DC2626',
                    soft: '#FEE2E2',
                },
                dark: '#1F2937',
                soft: '#F3F4F6',
            },
            fontFamily: {
                display: ['Anton', 'Archivo', 'Impact', 'sans-serif'],
                sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
        },
    },
};
