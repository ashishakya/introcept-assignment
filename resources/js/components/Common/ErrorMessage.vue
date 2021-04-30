<template>
   <span class="text-danger" v-text="message"/>
</template>

<script>
export default {
  props: {
    message: {required: true, type: String}
  }
}
</script>

<style scoped>

</style>
