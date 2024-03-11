<template>
    <div>
        <label :for="name" class="block text-sm font-medium leading-6 text-white" v-text="label" />
        <div class="mt-2">
            <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                <input :type="type"
                       :name="name"
                       :id="name"
                       :autocomplete="name"
                       :placeholder="placeholder"
                       :value="modelValue"
                       @input="$emit('update:modelValue', $event.target.value)"
                       class="flex-1 border-0 bg-transparent py-1.5 px-2 text-white focus:ring-0 sm:text-sm sm:leading-6"
                />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'TextInput',

    props: {
        name: String,
        type: {
            type: String,
            default: 'text',
        },
        label: String,
        placeholder: String,
        modelValue: String,
    },

    emits: [
        'update:modelValue',
    ],
}
</script>
