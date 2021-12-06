const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  purge: [
    './app/**/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.html',
    './resources/**/*.js',
    './resources/**/*.jsx',
    './resources/**/*.ts',
    './resources/**/*.tsx',
    './resources/**/*.php',
    './resources/**/*.vue',
    './resources/**/*.twig',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/custom-forms'),
  ],
}
