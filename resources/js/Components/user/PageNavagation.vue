<template>
    <div class="top-container ps-3 d-flex flex-row justify-content-between align-items-center">
        <div>
            <button class="btn btn-light">
                <i class="bi bi-arrow-left-short"></i>
            </button>
        </div>
        <div>
            <button class="btn btn-light">
                <i class="bi bi-arrow-right-short"></i>
            </button>
        </div>
    </div>
</template>
<script>
export default {
    mounted(){
    }
}
</script>
<style lang="css" scoped>
.top-container{
    width: 12%;
}
.top-container div .btn{
    cursor: pointer;
}
</style>