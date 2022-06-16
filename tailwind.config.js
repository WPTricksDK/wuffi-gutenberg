module.exports = {
  content: [
    './*.php',
    './components/**/*.php',
    './templates/**/*.php',
    './public/**/*.js',
  ],
  darkMode: false, // 'class'
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
      h1_lg: ['72px', '110%'],
      h1: ['48px', '110%'],
      h2: ['36px', '110%'],
      h3: ['24px', '130%'],
      h4: ['20px', '130%'],
      h5: ['18px', '130%'],
      h6: ['16px', '130%'],
      p_small: ['14px', '150%'],
      p_base: ['16px', '150%'],
      p_lg: ['18px', '150%'],
      p_xl: ['20px', '150%'],
      p_2xl: ['24px', '130%'],
      link_base: ['16px', '100%'],
      link_xl: ['20px', '100%'],
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
          50: '#E0E4E6',
          100: '#8096A0',
          200: '#4D6C7A',
          300: '#335767',
          400: '#1A4254',
          500: '#002D41',
          600: '#002738',
          700: '#00202E',
          800: '#001924',
          900: '#00121A'
        },
        neutral: {
          50: '#F8F7F7',
          100: '#F0EBE6',
          200: '#B6B4B2',
          300: '#898785',
          400: '#666462',
          500: '#52504E',
          600: '#41403E',
          700: '#373634',
          800: '#2A2928',
          900: '#1F1F1E'
        },
        secondary: {
          50: '#FEFEFB',
          100: '#FDFBF0',
          200: '#FBF6E3',
          300: '#F3EBD0',
          400: '#E8DDBE',
          500: '#D9CAA5',
          600: '#BAA578',
          700: '#9C8253',
          800: '#7D6234',
          900: '#684A1F'
        },
        background: '#F7F5F2'
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}