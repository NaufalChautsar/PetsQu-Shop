module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
      'sm': '425px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1440px',
      'laptop': '1441px',
    },
    container: {
      center: true,
      padding: '16px',
    },
    extend: {
      colors: {
        primary: '#92400e',
        dark: '#0f172a',
      },
      screens: {
        '2xl': '1320px',
      },
    },
  },
  plugins: [
    require("daisyui"),
  ],
}
