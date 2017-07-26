<template>
	<div class="ui form">
        <div class="cover-image" id="cover-image">

        </div>
        <div class="centered" style="text-align: center">
            <label for="cover_image" class="ui button greenish">
                <i class="camera icon"></i> Choose Image
            </label>
            <strong>
                <small>{{ file.name }}</small>
            </strong>
            <input type="file" name="cover_image" id="cover_image" style="visibility:hidden" @change="setupFileUploader">
        </div>
        <div class="extra content">
            <div class="ui field">
                <div class="ui fluid input">
                    <input type="text" placeholder="Project Title..." v-model="title">
                </div>
            </div>
            <div class="ui field">
                <button class="ui fluid button blue" :disabled="titleSubmittable" @click="setProjectTitle">Save</button>
            </div>
        </div>
    </div>
</template>
<script>
    /**
     * What can be done extract the toast message functionality to other file
     */
	import Croppie from 'croppie';
	import axios from 'axios';
	import iziToast from 'izitoast';
	export default {
			mounted() {
			    this.image = this.imgURL;
                this.$on('image-uploaded', function(imageData){
                    this.image = imageData;
                    this.croppie.destroy();
                    this.setupCroppie();
                });
				this.setupCroppie();
			},

            data(){
                return {
                    imgURL: 'http://localhost:8000/images/image.png',
                    croppie: '',
                    image: null,
                    file: '',
                    title: '',
                    toast: ''
                }
            },
            computed: {
              titleSubmittable() {
                if(this.imageURL == null && this.title.trim().length < 2){
                    return true;
                } else{
                    return false;
                }
              }
            },
            methods:{
                setupCroppie() {
                    var el = document.getElementById('cover-image');
                    this.croppie = new Croppie(el, {
                        viewport: { width:200, height:200 },
                        boundary: { width:250, height:250 },
                        showZoomer: true,
                        enableOrientation: false
                    });
                    this.croppie.bind({
                        url: this.image,
                    });
//                    TODO
                    this.croppie.result('blob').then(function(blob) {
                        // do something with cropped blob
                    });
                },

                setupFileUploader(e) {
                    let files = e.target.files || e.dataTransfer.files;
                    if(!files.length) {
                        return;
                    }
                    this.createImage(files[0]);
                },

                createImage(file) {
	                var image = new Image();
	                var reader = new FileReader();
	                var context = this;
	                reader.onload = (e) => {
	                    context.image = e.target.result;
                        this.$emit('image-uploaded', e.target.result);
                    };
                    this.image = file;
                    reader.readAsDataURL(file);
                },

                getCroppedImage() {
                    var context = this;
                    this.croppie.result({
                       type: 'canvas', size: 'viewport',
                    })
                    .then(response => {
                        context.image = response
                    });
                },

                setProjectTitle() {
                    this.getCroppedImage();
                    var context = this;
                    axios.post('/set-project-title', {
                        title: context.title,
                        image: context.image
                    }).then(response => {
                        context.showSuccess();
                        context.clearForm();
                    })
                        .catch(error => {
                            console.log(error);
                            context.showError();
                        });

                },

                clearForm() {
                    this.image = this.imgURL;
                    this.title = ''
                },

                showSuccess(){
                    iziToast.success({
                        timeout: '5000',
                        title: 'Hey',
                        message: 'Project has been created',
                        position: 'topRight'
                    });
                },

                showError() {
                    iziToast.error({
                        timeout: '5000',
                        title: 'Error !',
                        message: 'No image selected',
                        position: 'topRight'
                    });
                }
            }
	}
</script>
<style scoped>
	
</style>