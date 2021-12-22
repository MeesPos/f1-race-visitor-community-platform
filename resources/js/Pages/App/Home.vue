<template>
    <LatestRequests />
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import LatestRequests from "../../Components/AuthHome/LatestRequests";

export default {
    name: "Home",
    components: {LatestRequests},
    layout: AppLayout
}
</script>

<style scoped>

</style>
