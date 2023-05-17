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
        worldwideBlue: '#2029F3',
        deathsYellow: '#EAD621',
        recoverGreentxt: '#0FBA68',
        recoverGreen: 'rgba(15, 186, 104, 0.1)',
        newCasesBlue: 'rgba(32,41,243, 0.1)',
        deathYellow: 'rgba(234,214,33, 0.1)'
      },
      height: {
        countryBox: '650px'
      }
    },
  },
  plugins: [],
}

