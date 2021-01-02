@extends('layouts.app')

@section('content')
    <div class="w-full h-full relative" id="app" v-resize="resize">
        <div class="min-h-screen flex flex-col transition-all ease-in-out duration-300 relative"
             :class="{        'lg:ml-80': drawer,      }">
            @include('layouts.includes.profile_drownDown')
            <div class="pt-24">
                <div class="bg-white min-h-screen -mt-24 pt-24">
                    <div class="flex justify-around mt-2 h-16">
                        <div class="relative h-full max-w-full">
                            <div class="absolute bottom-0 border-b-2 border-gray w-full"></div>
                            <div class="flex font-bold text-center relative justify-center h-full overflow-x-auto lg:mx-8">
                                <a class="block px-8 transition-all flex items-center hover:border-link hover:border-opacity-70 hover:border-b-4"
                                   v-for="(item, i) in tabsMenu" :key="i" :href="item.href"
                                   :class="{['border-b-4 border-link']: appRouteActive(item.href)}">
                                    <div><% item.title %></div>
                                </a></div>
                        </div>
                    </div>
                    <div class="px-8 my-16">
                        <div class="grid grid-cols-1 gap-12 md:grid-cols-3">
                            <div class="todo-folder-item hovered rounded active">
                                <div class="flex justify-between items-center">
                                    <div>20.12 - 5.01</div>
                                    <div class="todo-user-icons">
                                        <div class="todo-user-icon"></div>
                                        <div class="todo-user-icon"></div>
                                        <div class="todo-user-icon"></div>
                                    </div>
                                </div>
                                <div class="flex items-center"><i class="icon icon-corona mr-4 icon-lg"></i>
                                    <div class="text-2xl font-bold">Проект 1</div>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing</div>
                            </div>
                            <div class="todo-folder-item hovered rounded">
                                <div class="flex justify-between items-center">
                                    <div>20.12 - 5.01</div>
                                    <i class="icon icon-lock"></i></div>
                                <div class="flex items-center"><i class="icon icon-mask mr-4 icon-lg"></i>
                                    <div class="text-2xl font-bold">Проект 1</div>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing</div>
                            </div>
                            <div class="todo-folder-item hovered rounded">
                                <div class="flex justify-between items-center">
                                    <div>20.12 - 5.01</div>
                                    <div class="todo-user-icons">
                                        <div class="todo-user-icon"></div>
                                        <div class="todo-user-icon"></div>
                                        <div class="todo-user-icon"></div>
                                        <div class="todo-user-icon"></div>
                                    </div>
                                </div>
                                <div class="flex items-center"><i class="icon icon-jeverly mr-4 icon-lg"></i>
                                    <div class="text-2xl font-bold">Проект 1</div>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed bottom-12 w-full flex justify-center" :class="{'sm:pl-80': drawer}"><a
                class="btn todo-secondary-inverted-outlined btn-rounded" href="#"
                @click.prevent="projCreate = true, projCreateTitle = 'Добавьте новый проект:'">Создать проект</a></div>
        <transition name="fade">
            <div class="w-screen h-screen bg-primary bg-opacity-70 block top-0 fixed z-10 lg:hidden" v-if="drawer"
                 @click="drawer = !drawer"></div>
        </transition>
        <transition name="drawer">
            <div class="fixed w-80 h-screen overflow-auto max-h-screen top-0 z-10" v-if="drawer">
                <div class="todo-drawer-bg relative">
                    <div class="pl-4 relative sm:pl-9"><a class="flex items-center pl-5 py-9" href="/">
                            <div class="todo-logo"></div>
                        </a>
                        <div class="space-y-2 font-bold sm:py-9"><a class="block pl-5 py-3 rounded-l-full"
                                                                    v-for="(item, i) in drawerMenu" :key="i"
                                                                    :href="item.href"
                                                                    :class="{          'bg-link': appRouteActive(item.href),        }"><%
                            item.title %></a></div>
                    </div>
                    <div class="absolute bottom-0 h-28 border-t border-grayBg w-full pl-4 sm:pl-9">
                        <div class="flex flex items-center pt-4 pl-4">
                            <div class="todo-user-icon-xl online mr-4"></div>
                            <div class="font-bold text-lg">Nickname
                                <div class="absolute font-normal text-xs text-gray">В сети</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        <div class="z-10 relative">
            <transition name="fade" @before-enter="projCreateContent = true" @before-leave="projCreateContent = false">
                <div class="fixed h-screen w-screen top-0 left-0 bg-primary bg-opacity-50 text-primary flex items-center"
                     @click.self="projCreate = false" v-if="projCreate">
                    <transition name="from-bottom">
                        <div
                            class="relative mx-auto bg-white p-8 min-h-full w-full overflow-auto max-h-full md:w-2/3 md:min-h-0 md:rounded-4xl"
                            v-if="projCreateContent">
                            <div class="p-4 font-bold text-2xl text-center"><% projCreateTitle %></div>
                            <form class="grid grid-cols-4 gap-5">
                                <div class="todo-input col-span-full"><input placeholder="Название задачи"></div>
                                <div class="todo-input col-span-full"><textarea placeholder="Описание задачи..."></textarea>
                                </div>
                                <div class="col-span-full md:col-span-2">
                                    <div class="font-bold text-lg mb-4">Добавьте участников:</div>
                                    <div class="todo-input col-span-full mb-4"><input placeholder="Введите имя"
                                                                                      @focus="addUsers = true, addUsersTitle = 'Добавьте участников:'">
                                    </div>
                                    <div class="grid grid-cols-6 gap-4">
                                        <div class="text-center" v-for="(item, i) in Array(6)" :key="i">
                                            <div class="todo-user-icon-xl mb-2 mx-auto"></div>
                                            <div class="text-sm mx-auto">Имя</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-full md:col-span-1">
                                    <div class="font-bold text-lg mb-4">Время:</div>
                                    <div class="todo-input col-span-full"><input placeholder="12:00"></div>
                                </div>
                                <div class="col-span-full md:col-span-1">
                                    <div class="font-bold text-lg mb-4">Дата:</div>
                                    <div class="todo-input col-span-full"><input placeholder="01:01:2020"></div>
                                </div>
                                <div class="col-span-full flex justify-center pt-16"><a
                                        class="btn btn-long todo-secondary-inverted-outlined btn-rounded"
                                        href="#">Добавить</a></div>
                                <div class="col-span-full flex justify-center"><a class="btn" href="#"><i
                                            class="icon icon-lockout"></i>
                                        <div class="font-normal">Приватный проект</div>
                                    </a></div>
                            </form>
                            <div class="absolute top-12 right-8"><a class="icon icon-close" href="#"
                                                                    @click.prevent="projCreate = false"></a></div>
                        </div>
                    </transition>
                </div>
            </transition>
            <transition name="fade" @before-enter="addUsersContent = true" @before-leave="addUsersContent = false">
                <div class="fixed h-screen w-screen top-0 left-0 bg-primary bg-opacity-50 text-primary flex items-center"
                     @click.self="addUsers = false" v-if="addUsers">
                    <transition name="from-bottom">
                        <div
                            class="relative mx-auto bg-white p-8 min-h-full w-full overflow-auto max-h-full md:w-2/3 md:min-h-0 md:rounded-4xl"
                            v-if="addUsersContent">
                            <div class="p-4 font-bold text-2xl text-center"><% addUsersTitle %></div>
                            <form class="grid grid-cols-4 gap-5 mx-auto sm:w-1/2">
                                <div class="todo-input col-span-full"><input placeholder="Введите имя"></div>
                                <div class="col-span-full">
                                    <div class="shadow-lg rounded-3xl py-4 border border-grayBg">
                                        <ul class="divide-y divide-grayBg max-h-80 overflow-y-auto">
                                            <li class="flex items-center space-x-4 p-4" v-for="(item, i) in Array(6)"
                                                :key="i">
                                                <div class="todo-user-icon-xl"></div>
                                                <div class="text-sm flex-1">Имя участника</div>
                                                <a class="btn-icon bg-grayBg" v-if="[0, 2, 4].includes(i)" href="#"><i
                                                        class="icon icon-sm icon-plus-gray-darken"></i></a><a
                                                    class="btn-icon" v-else href="#"><i
                                                        class="icon icon-sm icon-success"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-span-full flex justify-center py-12"><a
                                        class="btn btn-long todo-secondary-inverted-outlined btn-rounded"
                                        href="#">Добавить</a></div>
                            </form>
                            <div class="absolute top-12 right-8"><a class="icon icon-close" href="#"
                                                                    @click.prevent="addUsers = false"></a></div>
                        </div>
                    </transition>
                </div>
            </transition>
        </div>
    </div>
@endsection
