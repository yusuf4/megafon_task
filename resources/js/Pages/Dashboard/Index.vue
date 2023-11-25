<template>
    <div>
        <p class="my-8 text-lg text-blue-500 font-semibold text-center">Some information</p>
    </div>
</template>

<script>
import Layout from "../Layout.vue";
export default {
    name: "Index",
    layout:Layout,
    props:{
        userRole:Number,
    }
}
</script>
