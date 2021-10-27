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

            <!-- <div class="flex mx-auto items-center justify-center shadow-lg mt-5 mx-8 mb-4 max-w-lg">
                <form @submit.prevent="submitComment()" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                        <div class="w-full md:w-full px-3 mb-2 mt-2">
                            <textarea id="content" v-model="form.content" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                        </div>
                        <div class="w-full md:w-full flex items-start md:w-full px-3">
                            <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                            <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            </div>
                            <div class="-mr-1">
                            <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>
                            </div>
                        </div>
                    </div>
                </form>
            </div> -->

    </app-layout>
</template>
<script>
import AppLayout from '../../Layouts/AppLayout.vue'

const dayjs = require('dayjs')

export default {
    props: [
        'subject'
    ],
    data() {
        return {
            form: this.$inertia.form({
                content: null,
                subject_id: this.subject.id,
            }),
            show: false,
            editForm: this.$inertia.form({
                content: null,
                subject_id: this.subject.id,
                id: null
            }),
        }
    },
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
