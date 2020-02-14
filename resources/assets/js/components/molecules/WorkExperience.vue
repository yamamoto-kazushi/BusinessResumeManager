<template>
    <div class="work-experience-single col-12 row">
        <label class="input-text-name offset-1 col-1">
            項番:{{ this.no}}
        </label>
        <input-text
            item-name="業種"
            input-type="text"
            input-name="kind"
            :input-value="this.$store.getters.getWorkList({no: this.no -1, name: 'kind'})"
            :maxlength="20"
            :setter-no="this.no"
            setter-name="kind"
            placeholder="小売"
            :is-required="true"
            class="offset-2 col-10"
        />
        <input-text-area
            item-name="業務内容"
            input-name="comment"
            :input-value="this.$store.getters.getWorkList({no: this.no -1, name: 'comment'})"
            :setter-no="this.no"
            setter-name="comment"
            placeholder="某企業向け卸売システム開発"
            :is-required="true"
            class="offset-2 col-10"
        />
        <input-year-month
            item-name="開始年月"
            input-name="start"
            :input-year="this.$store.getters.getWorkList({no: this.no -1, name: 'startYear'})"
            :input-month="this.$store.getters.getWorkList({no: this.no -1, name: 'startMonth'})"
            :setter-no="this.no"
            setter-name="start"
            :is-required="true"
            class="offset-2 col-10"
        />
        <input-year-month
            item-name="終了年月"
            input-name="end"
            :input-year="this.$store.getters.getWorkList({no: this.no -1, name: 'endYear'})"
            :input-month="this.$store.getters.getWorkList({no: this.no -1, name: 'endMonth'})"
            :setter-no="this.no"
            setter-name="end"
            :is-required="true"
            class="offset-2 col-10"
        />
        <input-check-box
            item-name="作業区分"
            :input-data-list="getworkDivList(this.no)"
            :setter-no="this.no"
            :is-required="true"
            class="offset-2 col-10"
        />
        <input-text
            item-name="システム"
            input-type="text"
            input-name="system"
            :input-value="this.$store.getters.getWorkList({no: this.no -1, name: 'system'})"
            :maxlength="20"
            :setter-no="this.no"
            setter-name="system"
            placeholder="アプリ"
            :is-required="true"
            class="offset-2 col-10"
        />
        <input-text
            item-name="形態"
            input-type="text"
            input-name="type"
            :input-value="this.$store.getters.getWorkList({no: this.no -1, name: 'type'})"
            :maxlength="20"
            :setter-no="this.no"
            setter-name="type"
            placeholder="SE"
            :is-required="true"
            class="offset-2 col-10"
        />
        <input-text
            item-name="PJ全体規模(人数)"
            input-type="text"
            input-name="wholeSize"
            :input-value="this.$store.getters.getWorkList({no: this.no -1, name: 'wholeSize'})"
            :maxlength="5"
            :setter-no="this.no"
            setter-name="wholeSize"
            placeholder="30"
            :is-required="true"
            class="offset-2 col-10"
        />
        <input-text
            item-name="チーム規模(人数)"
            input-type="text"
            input-name="teamSize"
            :input-value="this.$store.getters.getWorkList({no: this.no -1, name: 'teamSize'})"
            :maxlength="5"
            :setter-no="this.no"
            setter-name="teamSize"
            placeholder="5"
            :is-required="true"
            class="offset-2 col-10"
        />
        <input-text-area
            item-name="OS/DB"
            input-name="os"
            :input-value="this.$store.getters.getWorkList({no: this.no -1, name: 'os'})"
            :setter-no="this.no"
            setter-name="os"
            placeholder="Windows 10, MySQL"
            :is-required="true"
            class="offset-2 col-10"
        />
        <input-text-area
            item-name="言語"
            input-name="lang"
            :input-value="this.$store.getters.getWorkList({no: this.no -1, name: 'lang'})"
            :setter-no="this.no"
            setter-name="lang"
            placeholder="Java,HTML,Javascript(Vue、React、JQuery),SQL"
            :is-required="false"
            class="offset-2 col-10"
        />
        <input-text-area
            item-name="M/W"
            input-name="mw"
            :input-value="this.$store.getters.getWorkList({no: this.no -1, name: 'mw'})"
            :setter-no="this.no"
            setter-name="mw"
            placeholder="SVN,Git,AWS"
            :is-required="false"
            class="offset-2 col-10"
        />
        <input-text-area
            item-name="フレームワーク"
            input-name="fw"
            :input-value="this.$store.getters.getWorkList({no: this.no -1, name: 'fw'})"
            :setter-no="this.no"
            setter-name="fw"
            placeholder="ZendFramework2,Laravel,Spring Framework"
            :is-required="false"
            class="offset-2 col-10"
        />
        <input-text-area
            item-name="ツール"
            input-name="tool"
            :input-value="this.$store.getters.getWorkList({no: this.no -1, name: 'tool'})"
            :setter-no="this.no"
            setter-name="tool"
            placeholder="Eclipse,Visual Studio,Redmine,A5M2,Cisco VPN Client,Tera Term"
            :is-required="false"
            class="offset-2 col-10"
        />

    </div>
</template>

<script>
import InputText from '../atoms/InputText'
import InputTextArea from '../atoms/InputTextArea'
import InputYearMonth from '../atoms/InputYearMonth'
import InputCheckBox from '../atoms/InputCheckBox'

    export default {
        name:"WorkExperience",
        components: {
            InputText,
            InputTextArea,
            InputYearMonth,
            InputCheckBox
        },
        data() {
            return {
                workDivList: [
                    {
                        name: "1.計画調査分析",
                        checked: false,
                        setterName: "workResearchFlag",
                    },
                    {
                        name: "2.要件定義",
                        checked: false,
                        setterName: "workRequirementFlag",
                    },
                    {
                        name: "3.基本設計",
                        checked: false,
                        setterName: "workBdFlag",
                    },
                    {
                        name: "4.詳細設計",
                        checked: false,
                        setterName: "workDdFlag",
                    },
                    {
                        name: "5.製造/構築",
                        checked: false,
                        setterName: "workPgFlag",
                    },
                    {
                        name: "6.テスト",
                        checked: false,
                        setterName: "workTFlag",
                    },
                    {
                        name: "7.保守",
                        checked: false,
                        setterName: "workOmFlag",
                    },
                    {
                        name: "8.その他",
                        checked: false,
                        setterName: "workOtherFlag",
                    }
                ]
            }
        },
        props: {
            no: {
                type: Number,
                required: true
            }
        },
        methods: {
            input(e) {
                this.$store.commit(this.setterName, e.target.value);
            },
            getworkDivList(no) {
                this.workDivList.map((item) => {
                    item.checked = this.$store.getters.getWorkList({no: no -1, name: item.setterName})
                })
                return this.workDivList
            }
        }
    }
</script>
<style lang="scss">
.form-control {
    font-size: 13px;
}
.required-label {
    color:red;
    font-size: 10px;
    padding: 0 !important;
}
</style>