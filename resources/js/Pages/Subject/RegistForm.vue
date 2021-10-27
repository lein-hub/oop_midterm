<template lang="">
    <app-layout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                교과목 등록
            </h2>
        </template>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="submit()" action="#" method="POST">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                        <label for="company-website" class="block text-sm font-medium text-gray-700">
                        과목명
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="text" id="title" v-model="form.name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="과목명을 입력해 주세요">
                        </div>
                    </div>
                    </div>

                    <div>
                    <label for="about" class="block text-sm font-medium text-gray-700">
                        설명
                    </label>
                    <div class="mt-1">
                        <textarea id="content" rows="3" v-model="form.desc" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="설명을 입력해 주세요"></textarea>
                    </div>
                    </div>

                    <div class="col-span-3 sm:col-span-2">
                        <label for="company-website" class="block text-sm font-medium text-gray-700">
                        학점
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="number" id="point" v-model="form.point" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                    </button>
                </div>
                </div>
            </form>
            </div>
    </app-layout>
</template>
<script>
import AppLayout from '../../Layouts/AppLayout.vue'
export default {
    props: [
        'subject'
    ],
    components: {
        AppLayout
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                desc: null,
                point : null,
            }),
        }
    },
    methods: {
        submit() {
            if (this.subject) {
                return this.form.patch('/subject/' + this.subject.id);
            }else {
                return this.form.post('/subject');
            }
        }
    },
    mounted() {
        if (this.subject) {
            this.form.name = this.subject.name;
            this.form.desc = this.subject.desc;
            this.form.point = this.subject.point;
        }
    }
}
</script>
<style lang="">

</style>
