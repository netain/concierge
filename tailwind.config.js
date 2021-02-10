module.exports = {
  purge: {
    content: [
      './resources/views/**/*.blade.php',
    ],
    options: {
      safelist: [
        'border-red-300', 
        'bg-red-100', 
        'text-red-700',
        'border-green-300', 
        'bg-green-100', 
        'text-green-700',
        'border-yellow-300', 
        'bg-yellow-100', 
        'text-yellow-700'
      ]
    }
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
