<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Register Employee</div>
        <div class="card-body">
          <form @submit.prevent="handleSubmit" @keydown='form.errors.clear($event.target.name)'>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="name" class="required">Name</label>
                <input type="text" v-model="formData.name" class="form-control" id="name" aria-describedby="emailHelp" name="name" placeholder="Enter name">
                <ErrorMessage v-if="form.errors.has('name')"
                              :message="form.errors.get('name')"/>
              </div>
              <div class="form-group col-md-6">
                <label class="required" style="display: block">Gender</label>
                <label for="gender_male">
                  <input type="radio" class="m-1" @click=form.errors.clear($event.target.name) v-model="formData.gender" id="gender_male" placeholder="Select gender" name="gender"
                         value="male">Male
                </label>
                <label for="gender_female">
                  <input type="radio"  class="m-1" @click=form.errors.clear($event.target.name) v-model="formData.gender" id="gender_female" placeholder="Select gender" name="gender"
                         value="female">Female
                </label>
                <ErrorMessage v-if="form.errors.has('gender')"
                              :message="form.errors.get('gender')"/>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="phone" class="required">Phone</label>
                <input type="tel" maxlength="10" class="form-control" v-model="formData.phone" name="phone" id="phone" placeholder="98********">
                <ErrorMessage v-if="form.errors.has('phone')"
                              :message="form.errors.get('phone')"/>
              </div>
              <div class="form-group col-md-6">
                <label for="email" class="required">Email address</label>
                <input type="email" class="form-control" v-model="formData.email" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <ErrorMessage v-if="form.errors.has('email')"
                              :message="form.errors.get('email')"/>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="address" class="required">Address</label>
                <input type="text" class="form-control" v-model="formData.address" id="address" name="address" placeholder="Enter address">
                <ErrorMessage v-if="form.errors.has('address')"
                              :message="form.errors.get('address')"/>
              </div>
              <div class="form-group col-md-6">
                <label for="nationality" class="required">Nationality</label>
                <input type="text" class="form-control" v-model="formData.nationality" id="nationality" name="nationality" placeholder="Enter nationality">
                <ErrorMessage v-if="form.errors.has('nationality')"
                              :message="form.errors.get('nationality')"/>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="dob" class="required">DOB</label>
                <input @change="form.errors.clear($event.target.name)" type="date" v-model="formData.dob" class="form-control" id="dob" name="dob" placeholder="Date of birth">
                <ErrorMessage v-if="form.errors.has('dob')"
                              :message="form.errors.get('dob')"/>
              </div>
              <div class="form-group col-md-6">
                <label for="education_background"  class="required">Education Background</label>
                <input type="text" class="form-control" v-model="formData.educational_background" id="education_background" name="educational_background" placeholder="Education background">
                <ErrorMessage v-if="form.errors.has('educational_background')"
                              :message="form.errors.get('educational_background')"/>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="mode_of_contact" class="required">Preferred mode of contact</label>
                <select v-model="formData.mode_of_contact" @change="form.errors.clear($event.target.name)" name="mode_of_contact" class="form-control" id="mode_of_contact">
                  <option value=null>Select an option</option>
                  <option value="email">Email</option>
                  <option value="phone">Phone</option>
                  <option value="none">None</option>
                </select>
                <ErrorMessage v-if="form.errors.has('mode_of_contact')"
                              :message="form.errors.get('mode_of_contact')"/>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a :href="route('employees.index')" class="btn btn-danger">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Form from "../../Classes/Form";
import ErrorMessage from "../Common/ErrorMessage";
import routeMixin from "../../mixins/routeMixin";

export default {
  name: "employee-create-form",
  components:{
    ErrorMessage
  },
  mixins:[routeMixin],
  data(){
    return {
      form:new Form(),
      formData:{
        name:null,
        gender:null,
        phone:null,
        email:null,
        address:null,
        dob:null,
        nationality:null,
        educational_background:null,
        mode_of_contact:null
      }
    }
  },
  methods:{
    handleSubmit(){
      const targetRoute = this.route("api.employees.store");
      this.form = new Form(this.formData);
      this.form.submit("post", targetRoute)
    }
  }
}
</script>

<style scoped>

</style>
