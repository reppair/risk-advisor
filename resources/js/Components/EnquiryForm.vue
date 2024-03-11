<script>
import TextInput from "@/Components/Enquiry/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import { router } from '@inertiajs/vue3';

export default {
    name: "EnquiryForm",

    components: {
        TextInput,
        InputError,
    },

    props: {
        products: Array,
        errors: Object,
    },

    data: () => ({
        name: '',
        email: '',
        phone: '',
        address: '',
        product_ids: [],
        message: '',
    }),

    methods: {
        submit() {
            router.post('enquiries/store', this.$data)
        },
        error(key) {
            return this.errors && this.errors[key] ? this.errors[key] : ''
        }
    }
}
</script>

<template>
    <form @submit.prevent="submit">
        <h2 class="text-base font-semibold leading-7 text-white">Make an enquiry</h2>
        <p class="mt-1 text-sm leading-6 text-gray-400">Let us know what type of insurance you need and how to contact you, we will be in touch ASAP!</p>

        <div class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-6">
            <TextInput v-model="name" :error="error('name')" name="name" label="Name" placeholder="Martin Blagoev" class="sm:col-span-4" />
            <TextInput v-model="email" :error="error('email')" name="email" label="Email" placeholder="mb.reppair@gmail.com" class="sm:col-span-4" />
            <TextInput v-model="phone" :error="error('phone')" name="phone" label="Phone" placeholder="+359 894 390 903" class="sm:col-span-4" />
            <TextInput v-model="address" :error="error('address')" name="address" label="Address" placeholder="Sofia, Bulgaria, 1000" class="sm:col-span-4" />

            <!-- product -->
            <div class="col-span-full border-t border-white/10 mt-2 pt-6">
                <fieldset>
                    <legend class="text-sm font-semibold leading-6 text-white">Please select one or more options below that you'd like to have quoted for insurance.</legend>
                    <label class="block select-none mt-3 space-y-3 border rounded border-white/20 py-2 px-3 cursor-pointer hover:bg-blue-950/60"
                           v-for="product in this.products">
                        <span class="flex gap-x-3">
                            <span class="flex h-6 items-center">
                                <input
                                    :id="product.name"
                                    :name="product.name"
                                    v-model="product_ids"
                                    :value="product.id"
                                    type="checkbox"
                                    class="h-4 w-4 rounded border-white/10 bg-white/5 text-indigo-600 focus:ring-indigo-600 focus:ring-offset-gray-900"
                                />
                            </span>

                            <span class="text-sm leading-6">
                                <label for="comments" class="font-medium text-white" v-text="product.name" />

                                <span class="block text-gray-400" v-text="product.description" />
                            </span>
                        </span>
                    </label>
                </fieldset>

                <input-error class="mt-1" v-if="errors.product_ids" :message="errors.product_ids" />
            </div>

            <!-- message -->
            <div class="col-span-full">
                <label for="message" class="block text-sm font-medium leading-6 text-white">Leave us a message</label>
                <div class="mt-2">
                    <textarea
                        id="message"
                        name="message"
                        v-model="message"
                        rows="3"
                        class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"
                        placeholder="Let us know a bit more about what your needs. This field is optional."
                    ></textarea>
                    <input-error class="mt-1" v-if="errors.message" :message="errors.message" />
                </div>
            </div>
        </div>

        <div class="mt-4 space-x-6">
            <button
                type="submit"
                class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
            >Submit</button>
        </div>
    </form>
</template>

