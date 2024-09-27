<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { nextTick, ref } from 'vue';

const showCreateRoomModal = ref(false);
const RoomNameInput = ref(null);
const RoomDescriptionInput = ref(null);

const form = useForm({
    name: '',
    description: '',
});

const CreateRoomPopUp = () => {
    showCreateRoomModal.value = true;

    nextTick(() => RoomNameInput.value.focus());
};

const createRoom = () => {


    form.post(route('room.store'), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal(); // Close the modal on successful creation
            alert('Room created successfully!'); // Optional: Show success message
        },
        onError: () => {
            RoomNameInput.value.focus(); // Focus on the input field if there's an error
        },
        onFinish: () => {
            form.reset(); // Reset the form fields after submission
        },
    })
};

const closeModal = () => {
    showCreateRoomModal.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        

        <DangerButton @click="CreateRoomPopUp">Create Room</DangerButton>

        <Modal :show="showCreateRoomModal" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                  Create New Room
                </h2>

               

                <div class="mt-6">
                    <InputLabel for="name" value="Name" class="sr-only" />

                    <TextInput
                        id="name"
                        ref="RoomNameInput"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Name"
                        
                    />

                   
                </div>


                <div class="mt-6">
                    <InputLabel for="description" value="description" class="sr-only" />

                    <TextInput
                        id="description"
                        ref="RoomDescriptionInput"
                        v-model="form.description"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Description"
                        @keyup.enter="createRoom"
                    />

                 
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <PrimaryButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="createRoom"
                    >
                        Create Room
                    </PrimaryButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
