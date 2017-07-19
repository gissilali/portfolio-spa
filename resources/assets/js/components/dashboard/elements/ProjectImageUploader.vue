<template>
    <div class="project-image" id="project-image">

    </div>
</template>
<script>
    import Croppie from 'croppie';
    export default {
        mounted() {
            var el = document.getElementById('project-image');
            var vanilla = new Croppie(el, {
                viewport: { width:300, height: 200 },
                boundary: { width:350, height:250 },
                showZoomer: true,
                enableOrientation: false
            });
            vanilla.bind({
                url: 'http://localhost:8000/images/image.png',
            });
            //on button click
            vanilla.result('blob').then(function(blob) {
                // do something with cropped blob
            });
        }
    }
</script>
<style scoped>

</style>