/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    "./src/**/*.{html,js}",
    "./node_modules/tw-elements/dist/js/**/*.js"
  ],
  theme: {
    extend: {
      // maxWidth: {
      //   '1440': '1440px',
      // }
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require("tw-elements/dist/plugin.cjs")
  ],
}

