<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import InstructorLayout from '@/Layouts/InstructorLayout.vue';


const form = useForm({
    subject_name: "",
});

const submit = () => {
    form.post(route('subject.add'), {
        onSuccess: () => {
            alert("subject added successfully");
        },
        onError: (errors) => {
            console.log("Update failed:", errors);
        },
    });
};
</script>

<template>
<InstructorLayout>
    <div class="main-container d-flex flex-row mt-5 align-items-center flex-column">
        <div class="container">
            <form @submit.prevent="submit" class="form">
                <label>Subject name: </label>
                <input
                    type="text"
                    placeholder="Name"
                    class="form-control mb-2"
                    v-model="form.subject_name"
                />
               

                <button class="btn btn-primary me-3" type="submit" :disabled="form.processing">
                    Submit
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
