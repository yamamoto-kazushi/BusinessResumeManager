<template>
    <div class="container">
        <div class="row">
            <h2 class="col-12">業務経歴書</h2>
            <input-text
                item-name="氏名"
                input-type="text"
                input-name="name"
                input-value=""
                :maxlength="200"
                setter-name="setName"
                placeholder="山田太郎"
                :is-required="true"
                class="offset-2 col-10"
            />
            <input-text
                item-name="氏名かな"
                input-type="text"
                input-name="nameKana"
                input-value=""
                :maxlength="200"
                setter-name="setNameKana"
                placeholder="ヤマダ　タロウ"
                :is-required="true"
                class="offset-2 col-10"
            />
            <input-text
                item-name="メールアドレス"
                input-type="text"
                input-name="email"
                input-value=""
                :maxlength="200"
                setter-name="setEmail"
                placeholder="a_bbbbbb@ideal-architects.co.jp"
                :is-required="true"
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
                :is-required="true"
                class="offset-2 col-10"
            />
            <single-select
                item-name="性別"
                setter-name="setGender"
                :item-list="this.genderItem"
                :is-required="true"
                class="offset-2 col-10"
            />
            <dete-select
                item-name="生年月日"
                :is-required="true"
                setter-name="setBirthday"
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
import DeteSelect from '../atoms/DeteSelect'
import SingleSelect from '../atoms/SingleSelect'

    export default {
        name:"ResumePage",
        components: {
            InputText,
            DeteSelect,
            SingleSelect
        },
        date () {
            genderItem: [
                {name: '男', value: 1},
                {name: '女', value: 2},
                {name: 'その他', value: 9}
            ]


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