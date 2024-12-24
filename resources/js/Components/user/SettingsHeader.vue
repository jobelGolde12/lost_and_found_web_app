<template>
    <div>
        <div class="container-fluid pt-3 d-flex flex-row justify-content-between align-items-center">
            <div>
                <h2 class="text-dark fw-lighter">Settings</h2>
            </div>

            <!-- search in settings  -->
            <div>
                <div class="search-bar input-group">
            <input
                type="text"
                class=""
                placeholder="Search..."
                aria-label="Search"
                list="categories"
                style="outline: none"
            />

          <datalist id="categories">
            <option
              :value="data.name"
              v-for="data in settingsList"
              :key="data.id"
            ></option>
          </datalist>
          <button class="btn btn-light" type="button">
            <i class="bi bi-search"></i>
          </button>
        </div>
            </div>
        </div>  
    </div>
</template>
<script>
export default {
    data(){
        return{
            settingsList: [{
                id: 1,
                name: 'trash'
            }]
        }
    }
}
</script>
<style lang="css" scoped>
.search-bar {
  position: relative;
  /* width: 50%; */
}
.search-bar input {
  position: relative;
  width: auto;
  padding: 0.5rem 1rem;
  border: 0.5px solid rgba(0, 0, 0, 0.2);
  border-radius: 5px 0 0 5px;
}
.search-bar input:focus,
.search-bar input:hover {
  outline: 1px solid rgba(0, 0, 0, 0.5);
}
</style>