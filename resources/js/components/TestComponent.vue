<template>
    <div>
        <ul class="h-full flex items-center space-x-4 font-bold text-white overflow-ellipsis max-w-full">
            <li class="hidden md:block" v-for="(item, i) in mainMenu" :key="i"><a
                class="rounded-full px-8 py-2 transition-all" :href="item.href"
                :class="{              'hover:bg-white hover:bg-opacity-20': !item.active,              'bg-white': item.active,              'text-primary': item.active,            }"><%tem.title%></a>
            </li>
            <li><a class="todo-user-icon-xl flex-initial relative" href="#" @mouseover="mainUserMenu = true"
                   @mouseleave="mainUserMenu = false" @click.self.prevent="mainUserMenu = !mainUserMenu">
                <transition name="fade">
                    <div class="absolute top-0 pt-20 md:right-1/2 right-0 transform md:translate-x-1/2"
                         v-if="mainUserMenu">
                        <ul class="bg-white text-primary rounded-xl py-2 shadow-xl font-normal text-center divide-y divide-grayBg">
                            <li class="py-2 px-8 transition-all hover:bg-grayBg">Профиль</li>
                            <li class="py-2 px-8 transition-all hover:bg-grayBg">Настройки</li>
                            <li class="text-red-500 py-2 px-8 transition-all hover:bg-grayBg">Выйти</li>
                        </ul>
                    </div>
                </transition>
            </a></li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                items: [],
                activeClass: 'is-visible',
                active: null
            };
        },
        methods: {
            showDetails(i) {
                this.active = i;
            }
        }
    };
</script>

<style scoped>

</style>
