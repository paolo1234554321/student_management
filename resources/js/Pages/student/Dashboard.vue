<script setup>
import StudentLayout from "@/Layouts/StudentLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";


const props = defineProps({
    user: {
        type: Object,
        default: () => [{}]
    },
    id: {
        type: Object,
        default: () => [{}]
    }
})
const data = ref([])

onMounted(() => {
    data.value = props.user.data1

}
)
console.log("user => " + JSON.stringify(props.user))
console.log("data => " + JSON.stringify(data.value))

</script>

<template>
  <Head title="Dashboard" />

  <StudentLayout>
    <div class="container mx-5 mt-5 ">
        <h1 class="text-dark text-center     mb-2">My Data </h1>
      <table class="table table-striped table-responsive table-bordered">
        <thead>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Type</th>
          <th>Date of birth</th>
          <th>Gender</th>
          <th>Phone Numeber</th>
          <th>Status</th>
          <th>GPA</th>

        </thead>
        <tbody>
          <tr>
            <td>{{props.user.data1.id }}</td>
            <td>{{props.user.data1.name}}</td>
            <td>{{ props.user.data1.email}}</td>
            <td>{{ props.user.data1.type}}</td>
            <td>{{ props.user.data2.date_of_birth}}</td>
            <td>{{ props.user.data2.gender}}</td>
            <td>{{ props.user.data2.phone_number}}</td>
            <td>{{ props.user.data2.enrollment_status}}</td>
            <td>{{ props.user.data2.gpa}}</td>
          </tr>
        </tbody>
      </table>

    </div>
  </StudentLayout>
</template>
