<template>
    <div class="container-fluid d-flex flex-row justify-content-between align-items-center">
        <div>
          <select name="filter" id="filter" class="form-control mt-2" v-model="selectedFilter" @change="emitFilter">
            <option disabled value="">Filter</option>
            <option value="all">All</option>
            <option value="lost">Lost</option>
            <option value="found">Found</option>
          </select>
        </div>

        <div>
          <p class="text-dark me-3">All <span v-if="selectedFilter !== 'all'">{{ selectedFilter }}</span> items</p>
        </div>
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
   width: 200px;
   border: none;
} 
  </style>