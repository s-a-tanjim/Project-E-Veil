<template>
  <div>
    <!-- Topbar will be here -->
    <component v-bind:is="'Navbar'"></component>
    <div class="wrapper-body">
      <!-- Sidebar -->
      <component v-bind:is="'Sidebar'"></component>
      <div class="body-container">Settings is under construction!</div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
</style>