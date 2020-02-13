<template>
    <div class="input-text-div form-group row">
        <label class="input-text-name col-2">
            {{this.itemName}}
        </label>
        <label v-if="this.isRequired" class="required-label col-1">【必須】</label>
        <div class="col-3">
        <select v-model="value" class="form-control" @change="input">
            <option v-for="item in this.itemList" :value="item.value" :key="item.value">
            {{ item.name  }}
            </option>
        </select>
        </div>
    </div>
</template>

<script>
    export default {
        name:"SingleSelect",
        data() {
            return {
                value: "",
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
                default: false
            },
            itemList: {
                required: true
            },
            defaultValue: {
                type: [String, Number],
                default: 1
            }
        },
        mounted: function() {
            if (this.defaultValue) {
                this.value = this.defaultValue;
            }
        },
        methods: {
            input() {
                this.$store.commit(this.setterName, this.value);
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