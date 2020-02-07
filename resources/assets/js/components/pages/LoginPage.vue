<template>
    <div class="container">
        <div class="row">
            <h2 class="col-12">ログイン</h2>
            <input-text
                item-name="メールアドレス"
                input-type="text"
                input-name="email"
                input-value=""
                :maxlength="200"
                setter-name="setEmail"
                placeholder="a_bbbbbb@ideal-architects.co.jp"
                class="offset-2 col-10"
            />
            <input-text
                item-name="パスワード"
                input-type="password"
                input-name="password"
                input-value=""
                :maxlength="30"
                setter-name="setPassword"
                placeholder="***********"
                class="offset-2 col-10"
            />
            <div class="btn-area col-12">
                <button class="btn btn-primary login-btn">ログイン</button>
            </div>
        </div>
    </div>
</template>

<script>
import InputText from '../atoms/InputText'

    export default {
        name:"LoginPage",
        components: {
            InputText
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped lang="scss">
.row {
    text-align: center;
}
.btn-area {
    text-align: center;
}
.login-btn {
    width: 12rem;
}
.container {
    font-size: 14px;
}
</style>