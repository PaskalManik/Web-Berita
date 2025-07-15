module.exports = {
  content: [
    "./*.{html,js}",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        customgreen: '#038a47',
        customgray: '#757575',
        customgreenmuda: '#C4E6C3',
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
