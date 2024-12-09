<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";


const props = defineProps({
    user: {
        type: Object,
        default: () => [{}]
    },
})
const data = ref([])

onMounted(() => {
    data.value = props.user

}
)
console.log("user => " + JSON.stringify(props.user))
console.log("data => " + JSON.stringify(data.value))

</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <div class="container mx-5 mt-5 ">
        <h1 class="text-dark text-center     mb-2">My Data - <span class="text-danger fw-bold">Non valid</span> </h1>
      <table class="table table-striped table-responsive table-bordered">
        <thead>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Type</th>
        </thead>
        <tbody>
          <tr>
            <td>{{props.user.id }}</td>
            <td>{{props.user.name}}</td>
            <td>{{ props.user.email}}</td>
            <td>--</td>
          </tr>
        </tbody>
      </table>

    </div>
  </AuthenticatedLayout>
</template>
