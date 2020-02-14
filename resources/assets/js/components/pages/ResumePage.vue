<template>
    <div class="container">
        <div class="row base-info">
            <h2 class="col-12">基本情報</h2>
            <input-text
                v-if="!this.$store.state.editFlag"
                item-name="社員番号"
                input-type="text"
                input-name="emproyeeNumber"
                :input-value="this.$store.state.emproyeeNumber"
                :maxlength="6"
                setter-name="setEmproyeeNumber"
                placeholder="A9999"
                :is-required="true"
                class="offset-2 col-10"
            />
            <div v-else class="offset-2 col-10 row">
                <label class="input-text-name col-2">
                    社員番号
                </label>
                <label class="offset-1 col-2">
                    {{this.$store.state.emproyeeNumber }}
                </label>
            </div>
            <input-text
                item-name="氏名"
                input-type="text"
                input-name="name"
                :input-value="this.$store.state.name"
                :maxlength="200"
                setter-name="setName"
                placeholder="山田太郎"
                :is-required="true"
                class="offset-2 col-10"
            />
            <input-text
                item-name="氏名カナ"
                input-type="text"
                input-name="nameKana"
                :input-value="this.$store.state.nameKana"
                :maxlength="200"
                setter-name="setNameKana"
                placeholder="ヤマダ　タロウ"
                :is-required="true"
                class="offset-2 col-10"
            />
            <input-text
                v-if="!this.$store.state.editFlag"
                item-name="メールアドレス"
                input-type="text"
                input-name="email"
                :input-value="this.$store.state.email"
                :maxlength="200"
                setter-name="setEmail"
                placeholder="a_bbbbbb@ideal-architects.co.jp"
                :is-required="true"
                class="offset-2 col-10"
            />
            <div v-else class="offset-2 col-10 row">
                <label class="input-text-name col-2">
                    メールアドレス
                </label>
                <label class="offset-1 col-5">
                    {{this.$store.state.email }}
                </label>
            </div>
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
                :default-value="this.$store.state.gender"
                :item-list="getGenderList"
                :is-required="true"
                class="offset-2 col-10"
            />
            <dete-select
                item-name="生年月日"
                :is-required="true"
                :default-value="this.$store.state.birthday"
                setter-name="setBirthday"
                class="offset-2 col-10"
            />
            <input-text
                item-name="現住所"
                input-type="text"
                input-name="address"
                :input-value="this.$store.state.address"
                :maxlength="200"
                setter-name="setAddress"
                placeholder="東京都新宿区西新宿"
                :is-required="true"
                class="offset-2 col-10"
            />
            <input-text
                item-name="国籍"
                input-type="text"
                input-name="country"
                :input-value="this.$store.state.country"
                :maxlength="20"
                setter-name="setCountry"
                placeholder="日本"
                :is-required="true"
                class="offset-2 col-10"
            />
            <input-text
                item-name="イニシャル"
                input-type="text"
                input-name="initial"
                :input-value="this.$store.state.initial"
                :maxlength="10"
                setter-name="setInitial"
                placeholder="T.Y"
                :is-required="false"
                class="offset-2 col-10"
            />
            <input-text
                item-name="最終学歴（学校名・学部名）"
                input-type="text"
                input-name="education"
                :input-value="this.$store.state.education"
                :maxlength="200"
                setter-name="setEducation"
                placeholder="どこかの大学情報部"
                :is-required="true"
                class="offset-2 col-10"
            />
            <input-text
                item-name="卒業年度"
                input-type="text"
                input-name="graduate"
                :input-value="this.$store.state.graduate"
                :maxlength="10"
                setter-name="setGraduate"
                placeholder="令和2年度"
                :is-required="true"
                class="offset-2 col-10"
            />
            <input-text
                item-name="最寄駅"
                input-type="text"
                input-name="station"
                :input-value="this.$store.state.station"
                :maxlength="50"
                setter-name="setStation"
                placeholder="JR埼京線 新宿駅"
                :is-required="true"
                class="offset-2 col-10"
            />
            <input-text-area
                item-name="資格"
                input-name="qualifications"
                :input-value="this.$store.state.qualifications"
                setter-name="setQualifications"
                placeholder="ITパスポート,基本情報技術者試験"
                :is-required="false"
                class="offset-2 col-10"
            />
            <input-check-box
                v-if="this.$store.state.isAdmin"
                item-name="管理者"
                :input-data-list="this.adminSetting"
                :setter-no="false"
                :is-required="false"
                class="offset-2 col-10"
            />
        </div>
        <div class="row work-info">
            <h2 class="col-12">実務経験</h2>
            <work-experience
                v-for="(work, index) in this.$store.state.workList"
                :key="index"
                :no="index + 1"
                class="single-experience"
            />
            <div class="work-add-button-area offset-10 col-2">
            <button class="btn btn-info" @click="workListAdd()">追加</button>
        </div>
        </div>

        <div class="btn-area col-12">
            <button class="btn btn-primary login-btn" @click="submitData()">確定</button>
        </div>

    </div>
</template>

<script>
import InputText from '../atoms/InputText'
import DeteSelect from '../atoms/DeteSelect'
import SingleSelect from '../atoms/SingleSelect'
import InputTextArea from '../atoms/InputTextArea'
import WorkExperience from '../molecules/WorkExperience'
import InputCheckBox from '../atoms/InputCheckBox'

    export default {
        name:"ResumePage",
        components: {
            InputText,
            DeteSelect,
            SingleSelect,
            InputTextArea,
            WorkExperience,
            InputCheckBox
        },
        data () {
            return {
                genderItem: [
                    {name: '男', value: 1},
                    {name: '女', value: 2},
                    {name: 'その他', value: 9}
                ],
                adminSetting: [{
                    name: "管理者として登録する",
                    setterName: "setAdminFlag",
                    checked: this.$store.state.adminFlag
                }],
            }
        },
        computed: {
            getGenderList () {
                return this.genderItem;
            }

        },
        methods: {
            workListAdd() {
                this.$store.commit('addWorkList')
            },
            submitData() {
                this.$store.dispatch('submitUserData', this.$router)
            }
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
.base-info {
    border:solid 1px #c0c0c0;
}

.work-info {
    margin-top: 10px;
    border:solid 1px #c0c0c0;
}
</style>