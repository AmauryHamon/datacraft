/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/js/*.js", "./site/**/*.php", "./content/**/*.txt"],
  theme: {
    extend: {
      colors: {
        'green': '#00ff00',
        'lightgreen': '#80F980',
        'ultralightgreen': '#CAFFCA',
        'lightgrey': '#f3f3f3',
      },
      fontFamily: {
        display: 'Windsor',
        body: 'Gerrit-M',
      },
      dropShadow: {
        'logo': '0 0 15px #00ff00',
        'text': '0 0 25px rgba(0,255,0,0.25)',
      },
      backgroundSize: {
        'size-200': '100% 200%',
      },
      backgroundPosition: {
        'pos-0': '0% 70%',
        'pos-100': '0% 50%',
      },
      lineHeight: {
        'tight': '1.1',
        'ultratight': '0.9'
      }


    },
  },
  plugins: [],
}

