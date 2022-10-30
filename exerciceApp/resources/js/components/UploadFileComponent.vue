<template>
    <!-- Le formulaire d'upload avec la référence "upload_form" -->
    <form v-on:submit.prevent="upload" enctype="multipart/form-data" ref="upload_form" >
        <label for="picture" >Séléctionnez une image</label><br>
        <input type="file" id="picture" name="picture" required accept=".jpg,.png,.gif" >
        <!-- La barre de progression -->
        <div>
            <span>
                <progress v-bind:value="pourcentage" max="100" >{{ pourcentage }} %</progress>
            </span>{{ (pourcentage > 0) ? pourcentage + ' %' : '' }}
        </div>
        <button type="submit" class="p-3">Uploader</button>
    </form>
</template>

<script>
export default {
    name: "upload-file",
    data () {
        return {
        // Pourcentage pour la barre de progression
            pourcentage : 0
        }
    },

    methods : {
        // Upload l'image
        upload () {
            // 1. L'objet "formData" avec la référence du formulaire
            let formData = new FormData(this.$refs.upload_form)
            // 2. Si un fichier est sélectionné = il possède un nom
            if (formData.get('picture').name) {
                // 3. La configuration pour la requête Ajax avec axios
                let config = {
                    /* Lors de la progression de l'upload "onUploadProgress", on met à jour
                    le $pourcentage en divisant les bytes envoyées "progressEvent.loaded"
                    par les bytes attendues "progressEvent.total"
                    */
                    onUploadProgress: progressEvent => {
                        this.pourcentage = Math.round((progressEvent.loaded * 100) / progressEvent.total)
                    }
                }
            // 4. On envoie la requête Ajax via axios avec les données du formulaire
            axios.post('upload', formData, config).then((data) => {
                // 5. Si l'image est uploadé
                if (data.data.chemin) {
                    // On réinitialise le formulaire et le pourcentage
                    this.resetForm()
                    alert("Image uploadé")
                }
            }).catch((error) => {
                this.resetForm()
                alert(error)
            })
            }
            else {
                alert("Sélectionnez le fichier à uploader")
            }
        },

        // Réinitialise le formulaire et le pourcentage
        resetForm () {
            this.$refs.upload_form.reset()
            this.pourcentage = 0
        }
    }
}
</script>

<style scoped>

</style>
