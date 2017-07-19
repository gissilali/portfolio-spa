<template>
	<div>
        <div class="cover-image" id="cover-image">

        </div>
        <div class="field centered" style="text-align: center">
            <label for="cover_image" class="ui button greenish">
                <i class="camera icon"></i>
                Choose Image</label>
            <strong>
                <small>{{ file.name }}</small>
            </strong>
            <input type="file" name="cover_image" id="cover_image" style="visibility:hidden" @change="setupFileUploader">
        </div>
        <div class="extra content">
            <div class="ui fluid action input">
                <input type="text" placeholder="Project Title..." v-model="title">
                <button class="ui button blue" @click="setProjectTitle" :disabled="titleNotSet">Save</button>
            </div>
        </div>
    </div>
</template>
<script>
	import Croppie from 'croppie';
	import axios from 'axios';
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
                    title: ''
                }
            },
            computed: {
              titleNotSet() {
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

                uploadImage() {
                    var context = this;
                    this.croppie.result({
                       type: 'canvas', size: 'viewport',

                    })
                    .then(response => {
                        console.log(response);
                        this.image = response;
                        axios.post('/cover-image/upload', {
                            image : context.image,
                        }).then(function(response){
                            console.log(response);
                        });
                    });
                },

                setProjectTitle() {
                    var context = this;
                    axios.post('/set-project-title', {
                        title: context.title
                    }).then(response => {
                        });

                }
            }
	}
</script>
<style scoped>
	
</style>