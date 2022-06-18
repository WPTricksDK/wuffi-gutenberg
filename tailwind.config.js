module.exports = {
  content: [
    './*.php',
    './public/**/*.js',
  ],
  darkMode: false, // 'class'
  important: true,
  theme: {
    screens: {
      'xs': '420px',
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      'xxl': '1440px'
    },
    container: {
      padding: {
        DEFAULT: '1.5rem',
        'xs': '1.5rem',
        'sm': '3rem',
        'md': '3rem',
        'lg': '3rem',
        'xl': '3rem',
        'xxl': '0'
      }
    },
    fontFamily: {
      sans: '"Inter"',
      serif: '"Sanomat"'
    },
    fontSize: {
      xs: ['12px', '16px'],
      sm: ['14px', '20px'],
      base: ['16px', '24px'],
      lg: ['18px', '28px'],
      xl: ['20px', '28px'],
      xl_2: ['24px', '32px'],
      xl_3: ['30px', '36px'],
      xl_4: ['36px', '40px'],
      xl_5: ['48px', '48px'],
      xl_6: ['60px', '60px'],
      xl_7: ['72px', '72px'],
      xl_8: ['96px', '96px'],
      xl_9: ['128px', '128px'],
    },
    borderWidth: {
      '0': '0',
      '1': '1px',
      '2': '2px',
      '3': '3px',
      '4': '4px',
      '6': '6px',
      '8': '8px',
    },
    extend: {
      colors: {
        primary: {
          50: '#FEE0E2',
          100: '#F98D95',
          200: '#D0D0FF',
          300: '#B9B8FF',
          400: '#A8A7FF',
          500: '#8B8AFF',
          600: '#6564DB',
          700: '#4645B7',
          800: '#2C2C93',
          900: '#1A1A7A'
        },
        neutral: {
          50: '#F9FAFB',
          100: '#F3F5F6',
          200: '#E5E8EB',
          300: '#C9CBCF',
          400: '#868A92',
          500: '#6A6E76',
          600: '#54585F',
          700: '#3F4146',
          800: '#292B30',
          900: '#171B26'
        }
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}