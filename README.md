- Download kirby plain
- Create site directory
- npm init
- npm install tailwind, alpine, postcss, concurrently, esbuild, autoprefixer
- setup scripts in package.json
    
    ```jsx
    "scripts": {
    		"tw-dev": "npx tailwindcss -i ./src/css/tailwind.css -o ./assets/css/style.css --jit --content './site/**/*.php' -w",
    		"tw-build": "npx tailwindcss -i ./src/css/tailwind.css -o ./assets/css/style.css --jit --content './site/**/*.php' -m",
    		"ajs-dev": "npx esbuild ./src/js/main.js --outfile=assets/js/bundle.js --bundle --watch",
    		"ajs-build": "npx esbuild ./src/js/main.js --outfile=assets/js/bundle.js --bundle --minify",
    		"dev": "concurrently --kill-others \"npm run tw-dev\" \"npm run ajs-dev\"",
    		"build": "npm run tw-build && npm run ajs-build"
    	},
    ```
    
- create assets directory for output css/js with js/css subfolders and their respective files
- create src directory for input css/js with js/css subfolders and their respective files
- in Terminal, `valet start` , then `valet link` , then `valet secure`
- link css in default.php `<?= css('assets/css/style.css') ?>`
- in style.css insert
    
    ```
    	@tailwind base;
    @tailwind components;
    @tailwind utilities;
    ```
    
- in main.js insert
    
    ```jsx
    import Alpine from 'alpinejs'
     
    window.Alpine = Alpine
    
    // code here
    // Alpine.data("site", () => ({
    
    // }))
    
    Alpine.start()
    ```
    
    data site will need to be visible in body tag or else `<body x-data="site">`
    
    ---
    
    - `npm install`
    - `npm run dev`
    - enter url.test in browser