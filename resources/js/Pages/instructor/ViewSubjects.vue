<script setup>
    import InstructorLayout from "@/Layouts/InstructorLayout.vue";
    import { Head, Link, useForm } from "@inertiajs/vue3";
    // import route from "vendor/tightenco/ziggy/src/js";
    import { onMounted, ref } from "vue";


    let props = defineProps({
        subjects: {
            type: Object,
            default: () => [{}]
        }
    })
    const subject = ref([])
    const deleteSubForm = useForm({
      id: ''
    })
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
         form.name = name
         form.id = id
         console.log("form => " + JSON.stringify(form.name))
         console.log("data => " + id + ' ' + name)
    }
    const submitForm = () => {
        form.put(route('edit.subjects', form.id),{
        onSuccess: () => console.log('Successfully update') ,
        onError: () => console.log('an error occured')
        })  
    }
    const getTheId = (idGet) => {
      deleteSubForm.id = idGet;
    }
    const deleteSubject = () => {
      deleteSubForm.delete(route('delete.subjects', deleteSubForm.id),{
      //  onSuccess: () => alert('deleted') ,
      // onError: () => console.log('an error occured')
      }
      )
    }
</script>

<template>
  <Head title="instructor dashboard" />
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
                <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="getTheIdToEdit(data.id, data.subject_name)">Edit</div>
            </td>
            <td>
                <div class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#deleteSub" @click="getTheId(data.id)">Delete</div>
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
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary"  data-bs-dismiss="modal">Submit edited</button>
        </div>
       </form>
      </div>
       
    </div>
  </div>
</div>


<!-- Modal To delete sub -->
<div class="modal fade" id="deleteSub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body d-flex justify-content-between align-items-center">
       <div> <p class="text-dark">Are you sure you want to delete the subject?</p></div>
      <div class="d-flex">
        <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" @click="deleteSubject()" data-bs-dismiss="modal">Yes</button>
      </div>
      </div>
       
    </div>
  </div>
</div>
  </InstructorLayout>
</template>
