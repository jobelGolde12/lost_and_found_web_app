<script setup>

</script>
<template>
    <div class="main-container bg-light row">
        <div class="col-12 col-sm-6 col-lg-6 left ">
           <slot/>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 right p-0">
            <img src="../../images/missing bag.jpg" alt="Right image">
        </div>
    </div>
</template>

<style lang="css" scoped>
.main-container{
    width: 100vw;
    height: 100vh;
    overflow: hidden;
}   
.main-container .right{
    overflow: hidden;
    border-radius: 20px 0 0 20px;
}
.right img{
    position: relative;
    width: 100%;
    height: 100%;
    transition: .5s;
    border-radius: inherit;
}
.right img:hover{
    transform: scale(1.1);  
}
</style>