import Alpine from 'alpinejs'
 
window.Alpine = Alpine


Alpine.data("site", () => ({
    modal: false,
    init(){
        console.log("site init")
    }
}))
Alpine.data("map", () => ({
    filterOpen: false,
    
    nodes: [],
    selectedNode: {},

    init(){
        this.fetchNodes()
        console.log("map init")

    },
    async fetchNodes(){
        try {
            let response = await fetch('/map.json'); // Adjust path as needed
            this.nodes = await response.json();
            console.log("Nodes loaded:", this.nodes);
            
        } catch (error) {
            console.error("Error loading nodes:", error);
        }
    },
    openModal(node) {
        this.selectedNode = node;
        this.modal = true;
    }
}))

Alpine.start()