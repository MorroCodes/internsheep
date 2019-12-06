<template>
        <form @submit="formSubmit"
  
        <button
        v-bind:class="{ 'i-am-active': button_active_state }"
        v-on:click="button_active_state = !button_active_state"
        >Solliciteren</button>
        <div v-else class="alert alert-success">
        Verstuurd!
        </div>

        </form>
   
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            button_active_state: false
            
        }
    }
</script>
