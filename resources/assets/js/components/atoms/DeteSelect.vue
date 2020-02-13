<template>
    <div class="input-text-div form-group row">
        <label class="input-text-name col-2">
            {{ this.itemName}}
        </label>
        <label v-if="this.isRequired" class="required-label col-1">【必須】</label>
        <div class="input-date col-7 row">
            <select v-model="year" class="form-control col-2" @change="getDays">
                <option v-for="n in 70" :value="n + 1950">
                {{ n + 1950 }}
                </option>
            </select>年
            <select v-model="month" class="form-control col-2" @change="getDays">
                <option v-for="n in 12" :value="n">
                {{ n }}
                </option>
            </select>月
            <select v-model="day" class="form-control col-2" @change="getDays">
                <option v-for="n in daysMax" :value="n">
                {{ n }}
                </option>
            </select>日
        </div>
    </div>
</template>

<script>
    export default {
        name:"DeteSelect",
        data() {
            return {
                year: "2000",
                month: "1",
                day: "1",
                daysMax: "31"
            }
        },
        props: {
            itemName: {
                type: String,
                required: true
            },
            setterName: {
                type: String,
                required: true
            },
            isRequired: {
                type: Boolean,
                required: true,
                defalut: false
            },
            defaultValue: {
                required: false
            }
        },
        mounted: function() {
            if (this.defaultValue) {
                const strSplit = this.defaultValue.split('-');
                this.year = strSplit[0];
                this.month= strSplit[1];
                this.getDays();
                this.day = strSplit[2];
                this.value = this.defaultValue;
            }
        },
        methods: {
            getDays() {
                const date = this.year +'-'+ this.month +'-'+ this.day;
                this.daysMax = new Date(this.year, this.month, 0).getDate();
                this.$store.commit(this.setterName, date);
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
}
.input-date {
    margin-left: 0;
}
</style>