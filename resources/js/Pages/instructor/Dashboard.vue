<script setup>
    import InstructorLayout from "@/Layouts/InstructorLayout.vue";
    import { Head, Link } from "@inertiajs/vue3";
    import { onMounted, ref } from "vue";


    let props = defineProps({
        allUsers: {
            type: Object,
            default: () => [{}]
        }
    })
    const users = ref([])

    onMounted(() => {
       users.value = props.allUsers.filter(user => user.type === 'student');

    }
    )
    console.log('users => ' + JSON.stringify(users.value))
    console.log('users2 => ' + JSON.stringify(props.allUsers))



</script>

<template>
  <Head title="superadmin dashboard" />
  <InstructorLayout>
    <div class="container mx-5 mt-5 ">
        <h1 class="text-dark text-center     mb-2">All Students </h1>
      <table class="table table-striped table-responsive table-bordered">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Type</th>

        </thead>
        <tbody>
          <tr v-for="data in users" :key="data.index">
            <td >{{data.name}}</td>
            <td >{{ data.email}}</td>
            <td >{{ data.type}}</td>
           
          </tr>
        </tbody>
      </table>

    </div>
  </InstructorLayout>
</template>
