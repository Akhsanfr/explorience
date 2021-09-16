const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {

    purge: {
        enabled: false,
        content: [
            './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
            './storage/framework/views/*.php',
            './resources/views/**/*.blade.php',
        ],
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            margin:['hover', 'group-hover'],
            fontWeight: ['hover'],
        },
    },

    plugins: [
        require('daisyui'),
        require('@tailwindcss/typography'),
    ],

    daisyui: {
        themes: [
            {
              'light': {
                    "primary": "#604087",
                    "primary-focus": "#533875",
                    "primary-content": "#ffffff",
                    "secondary": "#ffd500",
                    "secondary-focus": "#ffbf00",
                    "secondary-content": "#ffffff",
                    "neutral": "#291334",
                    "neutral-focus": "#200f29",
                    "neutral-content": "#ffffff",
                    "base-100": "#faf7f5",
                    "base-200": "#efeae6",
                    "base-300": "#e7e2df",
                    "base-content": "#291334",
                    "info": "#2094f3",
                    "success": "#009485",
                    "warning": "#ff9900",
                    "error": "#ff5724",
                    "--rounded-box": "1rem",
                    "--rounded-btn": "1.9rem",
                    "--rounded-badge": "1.9rem",
                    "--tab-border": "2px"
              },
              'dark': {
                    "primary": "#604087",
                    "primary-focus": "#533875",
                    "primary-content": "#ffffff",
                    "secondary": "#ffd500",
                    "secondary-focus": "#ffbf00",
                    "secondary-content": "#ffffff",
                    "neutral": "#2a2e37",
                    "neutral-focus": "#16181d",
                    "neutral-content": "#ffffff",
                    "base-100": "#3d4451",
                    "base-200": "#2a2e37",
                    "base-300": "#16181d",
                    "base-content": "#ebecf0",
                    "info": "#66c6ff",
                    "success": "#87d039",
                    "warning": "#e2d562",
                    "error": "#ff6f6f",
                    '--rounded-box': '1rem',
                    '--rounded-btn': '0.5rem',
                    '--rounded-badge': '1.9rem',
              }
            },
          ],
    }
};
