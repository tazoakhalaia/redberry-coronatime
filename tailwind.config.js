/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      screens:{
        'sm': {'max': '375px'}
      },
      colors: {
        btngreen: '#0FBA68',
        worldwideBlue: '#2029F3'
      },
      height: {
        countryBox: '650px'
      }
    },
  },
  plugins: [],
}

