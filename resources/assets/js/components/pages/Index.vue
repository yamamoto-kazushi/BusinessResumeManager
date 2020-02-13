<template>
    <div>
        <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">処理中・・・</div>
                </div>
            </div>
        </div>
    </div>

    </div>
</template>

<script>
    export default {
        name:"Index",
        beforeCreate() {
            this.$store.dispatch('redirect', this.$router)
        }
    }
</script>
