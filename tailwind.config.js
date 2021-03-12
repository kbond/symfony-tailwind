module.exports = {
  purge: {
    content: [
      './assets/**/*.js',
      './assets/**/*.css',
      './templates/**/*.twig',
    ],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
