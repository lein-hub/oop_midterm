<template lang="">
    <app-layout>
        <section class="py-1 bg-blueGray-50">
            <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-5">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">

                    <div class="block w-full overflow-x-auto">
                        <table class="items-center bg-transparent w-full border-collapse ">
                            <thead>
                                <tr>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        과목명
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        설명
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        학점
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        등록일
                                    </th>
                                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        변경일
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                        {{ subject.name }}
                                    </td>
                                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ subject.desc }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ subject.point }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ getDate(subject.created_at) }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ getDate(subject.updated_at) }}
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

                <div>
                    <div>
                        <button @click="clickDestroy()" class="p-2 pl-5 pr-5 bg-red-500 text-gray-100 text-lg rounded-lg focus:border-4 border-red-300">삭제</button>
                        <button @click="clickUpdate()" class="p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300">수정</button>
                    </div>
                </div>
            </section>
    </app-layout>
</template>
<script>
import AppLayout from '../../Layouts/AppLayout.vue'

const dayjs = require('dayjs')

export default {
    props: [
        'subject'
    ],
    components: {
        AppLayout
    },
    methods: {
        getDate(date) {
            const day = dayjs(date).format('YYYY-MM-DD HH:mm:ss');
            return day;
        },
        clickDestroy() {
            this.$inertia.form().delete('/subject/' + this.subject.id);
        },
        clickUpdate() {
            return this.$inertia.get('/subject/regist/' + this.subject.id + '/edit');
        },
    },
}
</script>
<style lang="">

</style>
