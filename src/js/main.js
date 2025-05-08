import Alpine from 'alpinejs'
 
window.Alpine = Alpine


Alpine.data("site", () => ({
    modal: false,
    selectedNodeSlug: null,
    init(){
        this.$el.addEventListener('open-modal', e => {
            this.modal = true
            this.selectedNodeSlug = e.detail.node; // Set the selected node to be used in the modal
            history.pushState(null, '', '?node=' + this.selectedNodeSlug)
        })
    }
}))
Alpine.data("map", () => ({
    filterOpen: false,
    
    nodes: [],
    selectedNode: {},

    init(){
        
        


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
    openModal(nodeSlug) {
        console.log("Opening modal for node:", nodeSlug);
        
        this.$dispatch('open-modal', { node: nodeSlug });

    }
}))

Alpine.start()