<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";


const props = defineProps({
    allUsers: {
        type: Object,
        default: () => [{}]
    }
})
const users = ref([])

onMounted(() => {
    users.value = props.allUsers

}
)
const deleteForm = useForm({
  id: ''
})

const deleteUser = (id) => {
  deleteForm.delete(route('deleteUser', id), {
    onSuccess: () => alert('deleted'),
    onError: (errors) => console.log("an error occured" + errors)
  })
}

</script>

<template>
  <Head title="Dashboard" />

  <AdminLayout>
    <div class="container mx-5 mt-5 ">
        <h1 class="text-dark text-center     mb-2">All Users </h1>
      <table class="table table-striped table-responsive table-bordered">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Type</th>
          <th>Action</th>

        </thead>
        <tbody>
          <tr v-for="data in users" :key="data.index">
            <td>{{data.name}}</td>
            <td>{{ data.email}}</td>
            <td>{{ data.type}}</td>
            <td>
                <Link :href="route('viewUsers', {'id' : data.id})" class="btn btn-primary" :class="{'disabled' : data.type === 'admin' || data.type === 'superadmin'}">View</Link>
                <button class="btn btn-warning" @click="deleteUser(data.id)" :class="{'disabled' : data.type === 'admin' || data.type === 'superadmin'}">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>

    </div>
  </AdminLayout>
</template>
