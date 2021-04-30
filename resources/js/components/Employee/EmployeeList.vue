<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Employees List</div>
        <div class="card-body">
          <div class="float-right"><a :href="route('employees.create')"><b>New Registration</b></a></div>
          <table class="table">
            <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Gender</th>
              <th scope="col">Contact</th>
              <th scope="col">Mode of Contact</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(employee, index) in employees" :key="index">
              <th scope="row" v-text="++index"/>
              <td v-text="employee.name"/>
              <td v-text="employee.gender"/>
              <td>
                <span style="display: block">Phone: <span v-text="employee.phone"/></span>
                <span style="display: block">Email: <span v-text="employee.email"/></span>
                <span style="display: block">Address: <span v-text="employee.address"/></span>
              </td>
              <td v-text="employee.mode_of_contact"/>
            </tr>
            <tr v-if="!employees.length">
              <td colspan="5" style="text-align: center"><b>No Data Found!!</b></td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import routeMixin from "../../mixins/routeMixin";

export default {
  name: "employee-list",
  data() {
    return {
      employees: []
    }
  },
  mixins:[routeMixin],
  mounted() {
    this.fetchEmployees()
  },
  methods: {
    fetchEmployees() {
      const targetRoute = this.route("api.employees.index");
      axios.get(targetRoute)
          .then(({data}) => this.employees = data.data)
          .catch(e => console.log("Error occurred while fetching employees " + e));
    }
  }
}
</script>

<style scoped>

</style>
