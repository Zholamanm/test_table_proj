<template>
    <div class="container py-8" style="background: #F8FAFC">
        <div class="container py-8 !bg-dark" style="border-radius: 20px">
            <table class="table-list" data-name="index-table" data-unique-id="moon-shine-user-resource">
                <thead>
                <tr>
                    <th data-column-selection="name" class="w-1">

                    </th>
                    <th data-column-selection="name" class="w-2/12">
                        Наименование
                    </th>
                    <th data-column-selection="quantity">
                        Кол-во
                    </th>
                    <th data-column-selection="avatar">
                        Источник
                    </th>
                    <th data-column-selection="avatar1">
                        Лазер
                    </th>
                    <th data-column-selection="avatar2">
                        Сварка
                    </th>
                    <th data-column-selection="avatar3">
                        Сборка
                    </th>
                    <th data-column-selection="avatar4">
                        Электр
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody v-for="(item, i) in items" :key="i">
                <tr :data-row-key="i">
                    <td data-column-selection="move">
                        <svg width="14" height="12" viewBox="0 0 14 12"
                             fill="none"
                             @click.prevent="item.position === 0 ? null : moveUp(item.id)"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 0L13.9282 12H0.0717969L7 0Z"
                                  :fill="item.position === 0 ? '#C4ABFB' : '#7843E9'"/>
                        </svg>

                        <svg style="margin-top: 4px" width="14" height="12"
                             viewBox="0 0 14 12" fill="none"
                             @click.prevent="item.position === items.length ? null : moveDown(item.id)"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 12L13.9282 0H0.0717969L7 12Z"
                                  :fill="item.position === items.length ? '#C4ABFB' : '#7843E9'"/>
                        </svg>

                    </td>
                    <td data-column-selection="name" class="flex items-center">
                        <p style="margin: 10px">{{ item.name }}</p>
                        <font-awesome-icon icon="chevron-right" :class="item.parts.length === 0 ? 'hidden' : '' "
                                           @click.prevent="openList(i)" :data-bs-icon="'arrow-right-' + i"/>
                        <font-awesome-icon icon="chevron-down" class="hidden"
                                           @click.prevent="closeList(i)" :data-bs-icon="'arrow-down-' + i"/>
                    </td>
                    <td data-column-selection="quantity">
                            <span class="badge badge-gray"><a
                                class="inline-flex items-center gap-1">{{ item.quantity }}</a></span>
                    </td>
                    <td data-column-selection="avatar">
                        {{ item.source }}
                    </td>
                    <td data-column-selection="laser">
                        {{ item.parts.length === 0 ? item.laser : '' }}
                    </td>
                    <td data-column-selection="welding">
                        {{ item.welding }}
                    </td>
                    <td data-column-selection="assembly">
                        {{ item.assembly }}
                    </td>
                    <td data-column-selection="electric">
                        {{ item.electric }}
                    </td>
                    <td>
                        <div class="flex flex-wrap items-center gap-2 flex-nowrap justify-end">
                            <a class="btn detail-button"
                               href="http://127.0.0.1:8000/admin/resource/moon-shine-user-resource/detail-page?resourceItem=1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                     class="text-current w-4 h-4  ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </a>
                            <div>
                                <div>
                                    <a class="btn btn-error"
                                       href="http://127.0.0.1:8000/admin/resource/moon-shine-user-resource/crud/1?_redirect=http%3A%2F%2F127.0.0.1%3A8000%2Fadmin%2Fresource%2Fmoon-shine-user-resource%2Findex-page"
                                       @click.prevent="deleteItem(item.id)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                             class="text-current w-4 h-4  ">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="w-12 hidden" v-for="(part, j) in item.parts" :data-bs-item="i" :key="j">
                    <td data-column-selection="move">

                    </td>
                    <td data-column-selection="name" class="flex items-center">
                        <p style="margin: 10px">{{ part.name }}</p>
                    </td>
                    <td data-column-selection="quantity">
                            <span class=""><a
                                class="inline-flex items-center gap-1">{{ part.quantity }}</a></span>
                    </td>
                    <td data-column-selection="source">
                        {{ part.source }}
                    </td>
                    <td data-column-selection="laser">
                        {{ part.laser }}
                    </td>
                    <td data-column-selection="welding">
                    </td>
                    <td data-column-selection="assembly">
                    </td>
                    <td data-column-selection="electric">
                    </td>
                    <td>
                        <div class="hidden flex flex-wrap items-center gap-2 flex-nowrap justify-end">
                            <a class="btn detail-button"
                               href="http://127.0.0.1:8000/admin/resource/moon-shine-user-resource/detail-page?resourceItem=1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                     class="text-current w-4 h-4  ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </a>
                            <div>
                                <template data-teleport-template="true">
                                    <div class="modal-template">
                                        <div>
                                            <div class="modal-dialog modal-dialog-auto ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirm</h5>
                                                        <button type="button" class="btn btn-close"
                                                                @click.stop="open=false" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                 fill="currentColor" aria-hidden="true"
                                                                 class="fill-current w-6 h-6  ">
                                                                <path fill-rule="evenodd"
                                                                      d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                                                      clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="mb-4">
                                                            <form class="form" method="POST" action=""
                                                                  enctype="multipart/form-data">
                                                                <input type="hidden" name="_token"
                                                                       value="SqRZpqCnuWZQVhKck1bi0qhl82DMD26ZsklkQOIu"
                                                                       autocomplete="off">
                                                                <div class="hidden"><input class="form-input"
                                                                                           type="hidden" name="_method"
                                                                                           value="DELETE"></div>


                                                                <div class="heading">
                                                                    <div>
                                                                        Are you sure?
                                                                    </div>
                                                                </div>

                                                                <div class="grid grid-cols-12 gap-6">
                                                                    <div class="col-span-12 xl:col-span-12">
                                                                        <div
                                                                            class="mt-3 flex w-full flex-wrap justify-start gap-2">
                                                                            <button type="submit"
                                                                                    class="btn form_submit_button btn-secondary">
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-backdrop"></div>
                                    </div>
                                </template>
                                <div>
                                    <a class="btn btn-error"
                                       href="http://127.0.0.1:8000/admin/resource/moon-shine-user-resource/crud/1?_redirect=http%3A%2F%2F127.0.0.1%3A8000%2Fadmin%2Fresource%2Fmoon-shine-user-resource%2Findex-page"
                                       @click.prevent="toggleModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                             class="text-current w-4 h-4  ">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            items: []
        }
    },
    mounted() {
        this.fetchItems()
    },
    methods: {
        async fetchItems() {
            await axios.get('/api/items').then(response => {
                this.items = response.data.items;
            })
        },
        async moveUp(id) {
            await axios.post('/api/items/move-up', {id}).then(this.fetchItems);
        },
        async moveDown(id) {
            await axios.post('/api/items/move-down', {id}).then(this.fetchItems);
        },
        async deleteItem(id) {
            await axios.delete(`/api/items/${id}`).then(this.fetchItems);
        },
        openList(id) {
            let list = document.querySelectorAll(`[data-bs-item="${id}"]`);
            for (let i = 0; i < list.length; i++) {
                list[i].classList.remove('hidden');
            }

            document.querySelector(`[data-bs-icon=arrow-right-${id}]`).classList.add('hidden');
            document.querySelector(`[data-bs-icon=arrow-down-${id}]`).classList.remove('hidden');
        },
        closeList(id) {
            let list = document.querySelectorAll(`[data-bs-item="${id}"]`);
            for (let i = 0; i < list.length; i++) {
                list[i].classList.add('hidden');
            }

            document.querySelector(`[data-bs-icon=arrow-right-${id}]`).classList.remove('hidden');
            document.querySelector(`[data-bs-icon=arrow-down-${id}]`).classList.add('hidden');
        }
    }
}
</script>
