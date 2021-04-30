<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Register Employee</div>
        <div class="card-body">
          <form>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="name" class="required">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" placeholder="Enter name">
              </div>
              <div class="form-group col-md-6">
                <label class="required">Gender</label>
                <label for="gender_male">
                  <input type="radio" class="form-control" id="gender_male" placeholder="Select gender" name="gender" value="male">Male
                </label>
                <label for="gender_female">
                  <input type="radio" class="form-control" id="gender_female" placeholder="Select gender" name="gender" value="female">Female
                </label>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="phone" class="required">Contact</label>
                <input type="number" class="form-control" name="contact" id="phone" placeholder="98********">
              </div>
              <div class="form-group col-md-6">
                <label for="email" class="required">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="address" class="required">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
              </div>
              <div class="form-group col-md-6">
                <label for="nationality" class="required">Nationality</label>
                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="dob" class="required">DOB</label>
                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of birth">
              </div>
              <div class="form-group col-md-6">
                <label for="education_background" class="required">Education Background</label>
                <input type="text" class="form-control" id="education_background" name="education_background" placeholder="Education Background">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="mode_of_contact" class="required">Preferred mode of contact</label>
                <select name="mode_of_contact" class="form-control" id="mode_of_contact">
                  <option value="">Select an option</option>
                  <option value="email">Email</option>
                  <option value="phone">Phone</option>
                  <option value="none">None</option>
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name:"create-employee-form"
}
</script>

<style scoped>

</style>
