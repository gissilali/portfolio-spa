<template>
	<div class="ui stackable equal width grid column">
		<div class="column">
			<div class="ui card fluid">
			  <div class="ui top attached label">
			  		Upload Cover Image
			  </div>
			  <div class="content">
			  	<cover-image-uploader></cover-image-uploader>
			  </div>
			</div>
		</div>
		<div class="column">
			<div class="ui card fluid">
			  <div class="ui top attached label">
			  		Upload Cover Image
			  </div>
			  <div class="content">
			  </div>
			  <div class="extra content">
			  		<form class="ui form">
						<div class="field">
						    <label>Project Description</label>
						    <textarea></textarea>
						 </div>
						 <div class="field">
						 	<div class="two fields">
							    <div class="field">
							      <label>Month</label>
									<select name="month" id="month">
                                        <option value="">1item</option>
                                        <option value="">1item</option>
                                        <option value="">2item</option>
                                        <option value="">3item</option>
                                        <option value="">4item</option>
                                        <option value="">5item</option>
                                        <option value="">6item</option>
                                        <option value="">7item</option>
                                        <option value="">8item</option>
                                        <option value="">9item</option>
                                        <option value="">10item</option>
                                        <option value="">11item</option>
                                        <option value="">12item</option>
									</select>
							    </div>
							    <div class="field">
							      <label>Year</label>
                                    <select name="year" id="year">
                                        <option value="">year 2001</option>
                                        <option value="">year 2002</option>
                                        <option value="">year 2003</option>
                                        <option value="">year 2004</option>
                                        <option value="">year 2005</option>
                                        <option value="">year 2006</option>
                                        <option value="">year 2007</option>
                                        <option value="">year 2008</option>
                                        <option value="">year 2009</option>
                                        <option value="">year 2010</option>
                                        <option value="">year 2011</option>
                                        <option value="">year 2012</option>
                                    </select>
							    </div>
							  </div>
						 </div>
					  	<div class="field">
						    <div class="ui">
						      <input type="checkbox" tabindex="0" class="hidden">
						      <label>Work in progress</label>
						    </div>
					  	</div>
					  <button class="ui button blue" type="submit">Save</button>
					</form>
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
	import CoverImageUploader from '../elements/CoverImageUploader';
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