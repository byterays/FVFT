<template>
   <div>
       <div class="row">
           <div class="col-12">
               <form @submit.prevent="createJob">
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label for="title" class="form-label">Job Title<span class="req">*</span></label>
                           </div>
                           <div class="col-md-8">
                               <input type="text" v-model="job_title" name="title" class="form-control" placeholder="Enter Job Title">
                               <div class="require text-danger title" v-text="errors.get('job_title')"></div>
                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label class="form-label">Company Name&nbsp;<span class="req">*</span></label>
                           </div>
                           <div class="col-md-8">
                               <input type="text" class="form-control" :value="company.company_name" readonly>
                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label for="no_of_employee" class="form-label">No of Employee<span class="req">*</span></label>
                           </div>
                           <div class="col-md-8">
                               <div class="row">
                                   <div class="col-md-4">
                                       <label for="male_employee" class="form-label">Male</label>
                                       <input id="male_employee" type="number" min="1" v-model="male_employee_number" class="form-control" placeholder="Enter number">
                                   </div>
                                   <div class="col-md-4">
                                       <label for="female_employee" class="form-label">Female</label>
                                       <input type="number" min="1" class="form-control" v-model="female_employee_number" placeholder="Enter number">
                                   </div>
                                   <div class="col-md-4">
                                       <label for="any_employee" class="form-label">Any</label>
                                       <input type="number" min="1" class="form-control" v-model="any_employee_number" placeholder="Enter number">
                                   </div>
                               </div>
                               <div class="require text-danger"> {{ errors.get('male_employee_number')}} </div>
                               <div class="require text-danger"></div>
                               <div class="require text-danger"></div>
                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label for="job_category" class="form-label">Job Category<span class="req"></span></label>
                           </div>
                           <div class="col-md-8">
                               <select class="form-control" data-placeholder="Select Job Category">
                               </select>
                               <div class="require text-danger category_id"></div>
                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label for="" class="form-label">Working Hours Per Day<span class="req">*</span></label>
                           </div>
                           <div class="col-md-8">
                               <div class="input-group">
                                   <input type="number" class="form-control" placeholder="eg, 8">
                                   <div class="input-group-append">
                                       <button type="button" class="btn btn-primary">In Hour(/hr)</button>
                                   </div>
                               </div>
                               <div class="require text-danger"></div>
                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label class="form-label">Working Days Per Week<span class="req">*</span></label>
                           </div>
                           <div class="col-md-8">
                               <div class="input-group">
                                   <input type="number" class="form-control" placeholder="eg, 5">
                                   <div class="input-group-append">
                                       <button type="button" class="btn btn-primary">Days</button>
                                   </div>
                               </div>
                               <div class="require text-danger working_days"></div>
                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label for="deadline" class="form-label">Apply Before</label>
                           </div>
                           <div class="col-md-8">
                               <input type="text" class="form-control" readonly>
                               <div class="require text-danger deadline"></div>
                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label class="form-label">Country<span class="req">*</span></label>
                           </div>
                           <div class="col-md-8">
                               <select name="country" id="select-country" class="form-control">
                               </select>
                               <div class="require text-danger country"></div>
                           </div>
                       </div>

                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label class="form-label">States<span class="req">*</span></label>
                           </div>
                           <div class="col-md-8">
                               <select name="state" id="select-state" class="form-control" data-placeholder="Select State">
                               </select>
                               <div class="require text-danger"></div>
                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label class="form-label">Cities<span class="req">*</span></label>
                           </div>
                           <div class="col-md-8">
                               <select id="select-city" class="form-control">
                               </select>
                               <div class="require text-danger"></div>
                           </div>
                       </div>

                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label for="" class="form-label">Contract Period<span class="req">*</span></label>
                           </div>
                           <div class="col-md-8">
                               <div class="row">
                                   <div class="col-md-6">
                                       <select class="form-control select2">
                                           <option value=""></option>
                                       </select>
                                   </div>
                                   <div class="col-md-6">
                                       <select class="form-control">

                                       </select>
                                   </div>
                               </div>

                               <div class="require text-danger"></div>
                               <div class="require text-danger"></div>

                           </div>

                       </div>
                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label for="job-description" class="form-label">Job Description</label>
                           </div>
                           <div class="col-md-8">
                               <div id="job-description" style="min-height: 15rem;"></div>
                           </div>
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label for="" class="form-label">Upload Featured Image</label>
                           </div>
                           <div class="col-md-8">
                               <input type="file" class="form-control" @change.prevent="handelImage">
                               <div class="require text-danger"></div>
                           </div>
                       </div>
                   </div>
                   <div class="mx-auto">
                       <button v-if="submitting" type="button" class="btn btn-primary rounded-0"><i class="fa fa-spinner fa-spin"></i></button>
                       <button v-else type="submit" class="btn btn-primary rounded-0">Next <i class="fa fa-arrow-right"></i></button>
                       <span class="ml-2">Applicant Qualification</span>
                   </div>
               </form>
           </div>
       </div>
   </div>
</template>

<script>
    import {EventBus} from "../../app";
    import {Errors} from "../../error";
    import CompanyService from "../../services/CompanyService";
    export default {
        name: "EditProfile",
        components: {
        },
        data: () => ({
            errors: new Errors(),
            submitting: false,

            // form data
            company_id:'',
            job_title:'',
            male_employee_number:'',
            female_employee_number:'',
            any_employee_number:'',
            job_category_id:'',
            working_hour_days:'',
            working_hour_week:'',
            apply_before:'',
            country_id:'',
            state_id:'',
            city_id:'',
            contract_period:'',
            featured_image:'',

        }),
        props: [
            'company',
        ],
        computed:{
        },
        async mounted(){
            var jd_quill = new Quill('#job-description', {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions
                }
            });
            // this.init();
        },
        methods: {
            init(){
                // set countries data

                // var vm = this;
                // $('.select-country').select2().on('change', function (e) {
                //     vm.category_id = e.target.value
                // });
                //
                // // custom event listener
                // EventBus.$on('jobCreated', () => {
                //     // run function
                // });
            },
            async createJob() {
                this.submitting = true;
                try {
                    let formData = new FormData();

                    formData.append("company_id", this.company_id);

                    this.job_title ? formData.append("job_title", this.job_title) : '';
                    this.male_employee_number ? formData.append("male_employee_number", this.male_employee_number) : '';
                    this.female_employee_number ? formData.append("female_employee_number", this.female_employee_number) : '';
                    this.any_employee_number ? formData.append("any_employee_number", this.any_employee_number) : '';

                    var description = $("#description").val();
                    description ? formData.append("description", description): '';

                    if(this.featured_image){
                        formData.append("featured_image", this.featured_image, this.featured_image.name);
                    }
                    const response = await CompanyService.createNewJob(formData);
                    if (response.data.error === false) {
                        Errors.Notification(response);
                    }
                } catch (error) {
                    // this.errors.record(error.response.data);
                    Errors.Notification(error.response);
                }
                this.submitting = false;

                EventBus.$emit('jobCreated');
                this.submitting = false;
            },

            handelImage(event){
                this.featured_image = event.target.files[0];
                this.featured_image_url = URL.createObjectURL(event.target.files[0]);
            },

            clearForm() {
                this.delete_id = this.job_title = this.company_name = this.job_category = '';
            },

            async showDeleteModal(delete_id){
                this.delete_id = delete_id;
                $("#deleteModal").modal("show");
            },

            async hideDelete(){
                this.delete_id = '';
                $("#deleteModal").modal("hide");
            },

            async deleteItem(){
                this.delete_submitting = true;
                const response = await CompanyService.deleteItem(this.delete_id);
                if (response.data.error === false) {
                    Errors.Notification(response);
                    this.hideDelete();
                    EventBus.$emit('itemDeleted');
                }
                this.delete_submitting = false;
            },
        },
    }
</script>

<style scoped>

</style>
