module.exports = {
    content: ['./resources/js/**/*.{vue,js,ts,jsx,tsx}', './public/index.html'],
    theme: {
        extend: {
            colors: {
                primary: '#1A202C',
                secondary: '#2D3748',
                accent: '#38B2AC',
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
                serif: ['Merriweather', 'serif'],
            },
            spacing: {
                '72': '18rem',
                '84': '21rem',
                '96': '24rem',
            },
            borderRadius: {
                'xl': '1.5rem',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
    mode: 'jit',
};
