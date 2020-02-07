<template>
    <div class="input-text-div form-group row">
        <label class="input-text-name col-2">
            {{ this.itemName}}
        </label>
        <label v-if="this.isRequired" class="required-label col-1">【必須】</label>
            <div class="col-5">
                <input
                    :type="this.inputType"
                    :name="this.inputName"
                    :value="this.inputValue"
                    :maxlength="this.maxlength"
                    :placeholder="this.placeholder"
                    @input="input"
                    class="form-control"
                />
            </div>
    </div>
</template>

<script>
    export default {
        name:"Header",
        props: {
            itemName: {
                type: String,
                required: true
            },
            inputType: {
                type: String,
                required: true
            },
            inputName: {
                type: String,
                required: true
            },
            inputValue: {
                required: true
            },
            maxlength: {
                type: Number
            },
            placeholder: {
                type: String
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
        methods: {
            input(e) {
                console.log(e);
                this.$store.commit(this.setterName, e.target.value);
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