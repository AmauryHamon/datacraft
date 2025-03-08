import Alpine from 'alpinejs'
 
window.Alpine = Alpine


Alpine.data("site", () => ({
    init(){
        console.log("site init")
    }
}))

Alpine.start()