<template>
	<div class="ui stackable equal width grid column">
		<div class="column">
			<div class="ui card fluid">
			  <div class="ui top attached label">
			  		Set Cover Image and Title
			  </div>
			  <div class="content">
			  	<project-title-form></project-title-form>
			  </div>
			</div>
		</div>
		<div class="column">
			<div class="ui card fluid">
			  <div class="ui top attached label">
			  		Project Details
			  </div>
			  <div class="content">
			  </div>
			  <div class="extra content">
			  		<project-details-form></project-details-form>
			  </div>
			</div>
		</div>
        <div class="column">
            <div class="ui card fluid">
                <div class="ui top attached label">
                    Upload Cover Image
                </div>
                <div class="content">
                    <project-image-uploader></project-image-uploader>
                </div>

            </div>
        </div>
	</div>
</template>
<script>
	import CoverImageUploader from '../elements/ProjectTitleForm';
	export default {
		components: {
			CoverImageUploader
		},

        methods: {
		    emitEvent() {
		        this.$emit('project-title-set');
            }
        }
	}
</script>
<style scoped>
	.column{
		padding:20px;
	}
</style>