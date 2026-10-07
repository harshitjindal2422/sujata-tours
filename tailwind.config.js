/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Http/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          50: '#f0f4f8',
          100: '#d9e2ec',
          200: '#bcccdc',
          300: '#9fb3c8',
          400: '#829ab1',
          500: '#627d98',
          600: '#486581',
          700: '#334e68',
          800: '#243b53',
          900: '#102a43',
        },
        navy: {
          50: '#f4f6f8',
          100: '#e5e9f0',
          800: '#1e293b',
          900: '#0f172a',
          950: '#080d1a',
        },
        accent: {
          DEFAULT: '#d97706',
          hover: '#b45309',
          light: '#fef3c7',
        },
        surface: {
          DEFAULT: '#ffffff',
          muted: '#f8f9f7',
          subtle: '#f1f3f0',
        },
        border: {
          DEFAULT: '#E6E8EB',
          subtle: '#f0f2f5',
        },
        charcoal: {
          DEFAULT: '#1F2933',
          muted: '#667085',
        }
      },
      fontFamily: {
        sans: ['"Plus Jakarta Sans"', 'Inter', 'system-ui', 'sans-serif'],
        heading: ['"Plus Jakarta Sans"', 'Inter', 'system-ui', 'sans-serif'],
      },
      boxShadow: {
        'subtle': '0 1px 3px 0 rgba(15, 23, 42, 0.05), 0 1px 2px -1px rgba(15, 23, 42, 0.03)',
        'card': '0 4px 12px -2px rgba(15, 23, 42, 0.05), 0 2px 6px -2px rgba(15, 23, 42, 0.03)',
        'card-hover': '0 10px 25px -3px rgba(15, 23, 42, 0.08), 0 4px 10px -4px rgba(15, 23, 42, 0.04)',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
