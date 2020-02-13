<template>
    <div class="input-text-div form-group row">
        <label class="input-text-name col-2">
            {{ this.itemName}}
        </label>
        <label v-if="this.isRequired" class="required-label col-1">【必須】</label>
        <div v-else class="col-1"></div>
        <div class="input-year col-7 row">
            <select v-model="year" class="form-control col-2"  @change="setYear">
                <option v-for="n in 90" :value="n + 1970">
                {{ n + 1950 }}
                </option>
            </select>年
            <select v-model="month" class="form-control col-2" @change="setMonth">
                <option v-for="n in 12" :value="n">
                {{ n }}
                </option>
            </select>月
        </div>
    </div>
</template>

<script>
    export default {
        name:"InputYearMonth",
        data() {
            return {
                year: "2000",
                month: "1"
            }
        },
        props: {
            itemName: {
                type: String,
                required: true
            },
            inputName: {
                type: String,
                required: true
            },
            inputYear: {
                required: true
            },
            inputMonth: {
                required: true
            },
            setterNo: {
                type: Number
            },
            setterName: {
                type: String,
                required: true
            },
            isRequired: {
                type: Boolean,
                required: true,
                defalut: false
            }
        },
        mounted: function() {
            if (this.inputYear) {
                console.log(this.inputYear)
                this.year = this.inputYear;
                this.setYear();
            }
            if (this.inputMonth) {
                this.month = this.inputMonth;
                this.setMonth();
            }
        },
        methods: {
            setYear() {
                this.$store.commit('setWorkList', {no: this.setterNo, name: this.setterName +'Year', value:this.year});
            },
            setMonth() {
                this.$store.commit('setWorkList', {no: this.setterNo, name: this.setterName +'Month', value: this.month});
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
.input-year {
    margin-left: 0;
}
</style>