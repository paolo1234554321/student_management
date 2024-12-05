<script setup>
    import InstructorLayout from "@/Layouts/InstructorLayout.vue";
    import { Head, Link, useForm } from "@inertiajs/vue3";
    import { onMounted, ref } from "vue";


    let props = defineProps({
        subjects: {
            type: Object,
            default: () => [{}]
        }
    })
    const subject = ref([])
   const form = useForm({
    name: '',
    id: ''
   })

    onMounted(() => {
      subject.value = props.subjects

    }
    )
    console.log('sub => ' + subject.value)

    const getTheIdToEdit = (id, name) => {
        form.id = id
        form.name = name

    }
</script>

<template>
  <Head title="superadmin dashboard" />
  <InstructorLayout>
    <div class="container mx-5 mt-5 ">
        <h1 class="text-dark text-center     mb-2">View Subjects </h1>
      <table class="table table-striped table-responsive table-bordered">
        <thead>
          <th>id</th>
          <th>Name</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          <tr v-for="data in subject" :key="data.index">
            <td >{{data.id}}</td>
            <td >{{data.subject_name}}</td>
            <td>
                <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="getTheIdToEdit(data.id,data.subject_name)">Edit</div>
            </td>
            <td>
                <div class="btn btn-warning">Delete</div>
            </td>
           
          </tr>
        </tbody>
      </table>

    </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Subject</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form @submit.prevent="submitForm" class="form w-100">
         <div>
            <input type="text" v-model="form.name" class="form-control">
         </div>
        
        <div class="d-flex gap-2 mt-3">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Done</button>
        </div>
       </form>
      </div>
       
    </div>
  </div>
</div>
  </InstructorLayout>
</template>
