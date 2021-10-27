<template lang="">
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                교과목 목록
            </h2>
        </template>
        <section class="py-1 bg-blueGray-50">
            <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-5">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

                    <div class="block w-full overflow-x-auto">
                        <table class="items-center bg-transparent w-full border-collapse ">
                            <thead>
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        #
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        과목명
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        설명
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        학점
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr v-for="subject in subjects" :key="subject.id">
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                        {{ subject.id }}
                                    </th>
                                    <td @click="show(subject.id)" class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                        {{ subject.name }}
                                    </td>
                                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ subject.desc }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ subject.point }}
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            </section>
    </app-layout>
</template>
<script>
import AppLayout from '../../Layouts/AppLayout.vue'
export default {
    props:[
        'subjects'
    ],
    components: {
        AppLayout
    },
    methods: {
        event() {
            this.$inertia.form().post('/subject');
        },
        show(subjectId) {
            return this.$inertia.get('/subject/' + subjectId);
        }
    },
}
</script>
<style lang="">

</style>
