<template>
    <div class="container">
      <select name="filter" id="filter" class="form-control mt-2" v-model="selectedFilter" @change="emitFilter">
        <option disabled value="">Filter</option>
        <option value="all">All</option>
        <option value="lost">Lost</option>
        <option value="found">Found</option>
      </select>
    </div>
  </template>
  
  <script>
  export default {
    name: 'FilterComponent',
    data() {
      return {
        selectedFilter: '' 
      };
    },
    methods: {
      emitFilter() {
        this.$emit('filterSelected', this.selectedFilter);
      }
    }
  };
  </script>
  
  <style scoped>
.container #filter{
   position: relative;
   width: 9%;
   border: none;
} 
  </style>