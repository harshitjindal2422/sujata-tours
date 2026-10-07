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
        // Requested Design Color System
        primary: {
          DEFAULT: '#B85C6A', // Pink City Rose
          hover: '#9E4A56',
          dark: '#873B46',
          light: '#FBECEF',
          50: '#FDF6F7',
          100: '#FBECEF',
          200: '#F6D4DA',
          300: '#ECAFB9',
          400: '#DD8291',
          500: '#B85C6A',
          600: '#9E4A56',
          700: '#873B46',
          800: '#71323C',
          900: '#5F2D35',
        },
        secondary: {
          DEFAULT: '#A94B45', // Jaipur Terracotta
          hover: '#8E3C37',
          light: '#F8ECEB',
        },
        ivory: {
          DEFAULT: '#FFF9F5', // Warm Ivory Background
          50: '#FFFFFF',
          100: '#FFF9F5',
          200: '#FBF2EB',
          300: '#F7EFE9',
        },
        sand: {
          DEFAULT: '#F7EFE9', // Soft Sand Secondary Background
          100: '#FAF4EF',
          200: '#F7EFE9',
          300: '#EFE3DA',
          400: '#E4D3C6',
        },
        gold: {
          DEFAULT: '#B89455', // Muted Heritage Gold Accent
          hover: '#A07E42',
          light: '#F7F1E6',
        },
        charcoal: {
          DEFAULT: '#292525', // Deep Charcoal Text
          muted: '#6B6363',
          subtle: '#918787',
          dark: '#1C1617', // Very dark footer & cinematic sections
          night: '#130E0F',
        },
        surface: {
          DEFAULT: '#FFFFFF',
          ivory: '#FFF9F5',
          sand: '#F7EFE9',
          card: '#FFFFFF',
        },
        border: {
          DEFAULT: '#EDE4DC',
          subtle: '#F4ECE4',
          dark: '#382E30',
        },
        // Backward-compatibility aliases for other blade views
        brand: {
          50: '#FDF6F7',
          100: '#FBECEF',
          200: '#F6D4DA',
          500: '#B85C6A',
          600: '#9E4A56',
          700: '#A94B45',
          800: '#71323C',
          900: '#292525',
        },
        navy: {
          50: '#FDF6F7',
          100: '#FBECEF',
          800: '#9E4A56',
          900: '#B85C6A',
          950: '#1C1617',
        },
        accent: {
          DEFAULT: '#B89455',
          hover: '#A07E42',
          light: '#F7F1E6',
        }
      },
      fontFamily: {
        sans: ['"Plus Jakarta Sans"', 'Inter', 'system-ui', 'sans-serif'],
        serif: ['"Playfair Display"', 'Georgia', 'serif'],
        display: ['"Playfair Display"', 'Georgia', 'serif'],
      },
      boxShadow: {
        'subtle': '0 2px 6px 0 rgba(41, 37, 37, 0.04)',
        'float': '0 12px 36px -4px rgba(41, 37, 37, 0.08), 0 4px 12px -2px rgba(41, 37, 37, 0.04)',
        'card': '0 4px 20px -2px rgba(41, 37, 37, 0.05)',
        'card-hover': '0 16px 32px -4px rgba(41, 37, 37, 0.1)',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
