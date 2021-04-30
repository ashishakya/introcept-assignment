<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Employee Detail</div>
        <div class="card-body">
          <div class="float-right"><a :href="route('employees.index')"><b>Back</b></a></div>
          <table class="table" v-if="hasEmployeeDetails">
            <tr>
              <th class="thead-dark">Name</th>
              <td v-text="employeeDetail.name"/>
            </tr>
            <tr>
              <th class="thead-dark">Gender</th>
              <td v-text="employeeDetail.gender"/>
            </tr>
            <tr>
              <th class="thead-dark">Contact</th>
              <td>
                <li>Phone: <span v-text="employeeDetail.phone"/></li>
                <li>Email: <span v-text="employeeDetail.email"/></li>
                <li>Address: <span v-text="employeeDetail.address"/></li>
                <li>Nationality: <span v-text="employeeDetail.nationality"/></li>
              </td>
            </tr>
            <tr>
              <th class="thead-dark">Mode of Contact</th>
              <td v-text="employeeDetail.mode_of_contact"/>
            </tr>
            <tr>
              <th class="thead-dark">DOB</th>
              <td v-text="employeeDetail.dob"/>
            </tr>
            <tr>
              <th class="thead-dark">Educational Background</th>
              <td v-text="employeeDetail.educational_background"/>
            </tr>
            <tr>
              <th class="thead-dark">Registered On</th>
              <td v-text="employeeDetail.created_at"/>
            </tr>
          </table>
          <div v-else class="text-center">
            No Details Found!!
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import routeMixin from "../../mixins/routeMixin";

export default {
  name: "employee-detail",
  props:{
    employeeId:{required:true, type:String}
  },
  data() {
    return {
      employeeDetail: []
    }
  },
  mixins:[routeMixin],
  mounted() {
    this.fetchEmployeeDetail()
  },
  methods: {
    fetchEmployeeDetail() {
      const targetRoute = this.route("api.employees.show",[this.employeeId]);
      axios.get(targetRoute)
          .then(({data}) => this.employeeDetail = data.data)
          .catch(e => console.log("Error occurred while fetching employee detail " + e));
    }
  },
  computed:{
    hasEmployeeDetails(){
      return Object.keys(this.employeeDetail).length > 0
    }
  }
}
</script>

<style scoped>

</style>
