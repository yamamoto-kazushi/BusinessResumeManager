<template>
    <div>
        <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">テストぽえーじですよ</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                    <button class="btn btn-sucsess" @click="onClick()">ぼたん</button>
                </div>
            </div>
        </div>
    </div>

    </div>
</template>

<script>
    export default {
        name:"Index",
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClick() {
                this.$router.push('/next/')
            }
        }
    }
</script>
