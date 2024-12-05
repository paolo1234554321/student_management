<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import InstructorLayout from '@/Layouts/InstructorLayout.vue';


// const form = useForm({
//     name: props.user.name,
//     email: props.user.email,
//     type: props.user.type, 
// });

// const submit = () => {
//     form.put(route('user.update', props.user.id), {
//         onSuccess: () => {
//             console.log("User updated successfully");
//         },
//         onError: (errors) => {
//             console.log("Update failed:", errors);
//         },
//     });
// };
</script>

<template>
<InstructorLayout>
    <div class="main-container d-flex flex-row mt-5 align-items-center flex-column">
        <div class="container">
            <form @submit.prevent="submit" class="form">
                <label>Name: </label>
                <input
                    type="text"
                    placeholder="Name"
                    class="form-control mb-2"
                    v-model="form.name"
                />
                <label>Email: </label>
                <input
                    type="text"
                    placeholder="Email"
                    class="form-control mb-2"
                    v-model="form.email"
                />
                <label>Type: </label>
                <input
                    type="text"
                    class="form-control mb-2"
                    v-model="form.type"
                    disabled
                />

                <button class="btn btn-primary me-3" type="submit" :disabled="form.processing">
                    Submit Edited
                </button>
                <Link :href="route('dashboard')" class="btn btn-dark">Back</Link>
            </form>
        </div>
    </div>
</InstructorLayout>
</template>

<style lang="css" scoped>
.main-container {
    width: 100%;
    height: 100%;
    position: absolute;
}
.form {
    width: auto;
}
</style>
