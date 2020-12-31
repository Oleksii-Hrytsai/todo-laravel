@extends('layouts.app')

@section('content')
<div class="w-full h-full relative" id="app" v-resize="resize">
    <div class="min-h-screen flex flex-col transition-all ease-in-out duration-300 relative"
         :class="{        'lg:ml-80': drawer,      }">
        <div class="absolute w-full h-24 z-10">
            <div class="flex h-full w-full px-4 bg-white text-primary font-bold border-b-2 border-grayBg sm:pt-4"><a
                    class="flex items-center pr-4 rounded-xl transition-all lg:hidden" href="#"
                    @click.prevent="drawer = !drawer">
                    <div class="todo-logo mr-4"></div>
                    <div>Меню</div>
                </a>
                <div class="flex flex-1 justify-between items-center px-4">
                    <div class="hidden flex-1 sm:flex">
                        <div>Мои планы</div>
                    </div>
                    <div class="sm:hidden"></div>
                    <a class="text-red-500 font-normal underline" href="#">Выйти</a></div>
            </div>
        </div>
        <div class="pt-24">
            <div class="bg-white flex-1 todo-auth-bg flex justify-center items-center p-4 min-h-screen -mt-24">
                <div class="todo-folder shadow-xl sm:w-2/3">
                    <div class="todo-folder-title">
                        <div class="text-2xl flex-1 flex justify-around"><a
                                class="text-opacity-50 text-white transition-all" href="#"
                                :class="{'underline text-opacity-100': authType}"
                                @click="authType = true">Регистрация</a><a
                                class="text-opacity-50 text-white transition-all" href="#"
                                :class="{'underline text-opacity-100': !authType}"
                                @click="authType = false">Авторизация</a></div>
                    </div>
                    <div class="todo-folder-items">
                        <div class="todo-folder-item">
                            <div class="flex justify-center items-center">
                                <transition name="fade" mode="out-in">
                                    <form class="grid grid-cols-1 gap-2 sm:w-5/6 sm:py-20" v-if="!authType" key="login">
                                        <div>
                                            <div class="font-bold text-lg mb-4">Логин</div>
                                            <div class="todo-input col-span-full mb-4"><input
                                                    placeholder="Введите ваш логин"></div>
                                        </div>
                                        <div>
                                            <div class="font-bold text-lg mb-4">Пароль</div>
                                            <div class="todo-input col-span-full mb-4"><input
                                                    placeholder="Введите ваш пароль"></div>
                                        </div>
                                        <div class="col-span-full flex justify-center pt-12"><a
                                                class="btn btn-long todo-secondary-inverted-outlined btn-rounded"
                                                href="#">Добавить</a></div>
                                    </form>
                                    <form class="grid grid-cols-1 gap-2 sm:w-5/6 sm:py-8" v-if="authType" key="signup">
                                        <div>
                                            <div class="font-bold text-lg mb-4">Имя пользователя</div>
                                            <div class="todo-input col-span-full mb-4"><input
                                                    placeholder="Введите ваше имя"></div>
                                        </div>
                                        <div>
                                            <div class="font-bold text-lg mb-4">E-mail</div>
                                            <div class="todo-input col-span-full mb-4"><input
                                                    placeholder="Введите ваш E-mail"></div>
                                        </div>
                                        <div>
                                            <div class="font-bold text-lg mb-4">Пароль</div>
                                            <div class="todo-input col-span-full mb-4"><input
                                                    placeholder="Введите ваш пароль"></div>
                                        </div>
                                        <div>
                                            <div class="font-bold text-lg mb-4">Подтвердить пароль</div>
                                            <div class="todo-input col-span-full mb-4"><input
                                                    placeholder="Повторите ваш пароль"></div>
                                        </div>
                                        <div class="col-span-full flex justify-center pt-8"><a
                                                class="btn btn-long todo-secondary-inverted-outlined btn-rounded"
                                                href="#">Добавить</a></div>
                                    </form>
                                </transition>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                                                :class="{          'bg-link': appRouteActive(item.href),        }"><% item.title %></a>
                    </div>
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
    <div class="z-10 relative"></div>
</div>
{{--    <div class="min-h-screen flex flex-col transition-all ease-in-out duration-300 relative lg:ml-80">--}}
{{--        <div class="absolute w-full h-24 z-10">--}}
{{--            <div class="flex h-full w-full px-4 bg-white text-primary font-bold border-b-2 border-grayBg sm:pt-4"><a--}}
{{--                    href="#" class="flex items-center pr-4 rounded-xl transition-all lg:hidden">--}}
{{--                    <div class="todo-logo mr-4"></div>--}}
{{--                    <div>Меню</div>--}}
{{--                </a>--}}
{{--                <div class="flex flex-1 justify-between items-center px-4">--}}
{{--                    <div class="hidden flex-1 sm:flex">--}}
{{--                        <div>Мои планы</div>--}}
{{--                    </div>--}}
{{--                    <div class="sm:hidden"></div>--}}
{{--                    <a href="#" class="text-red-500 font-normal underline">Выйти</a></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="pt-24">--}}
{{--            <div class="bg-white flex-1 todo-auth-bg flex justify-center items-center p-4 min-h-screen -mt-24">--}}
{{--                <div class="todo-folder shadow-xl sm:w-2/3">--}}
{{--                    <div class="todo-folder-title">--}}
{{--                        <div class="text-2xl flex-1 flex justify-around"><a href="#"--}}
{{--                                                                            class="text-opacity-50 text-white transition-all underline text-opacity-100">Регистрация</a><a--}}
{{--                                href="#" class="text-opacity-50 text-white transition-all">Авторизация</a></div>--}}
{{--                    </div>--}}
{{--                    <div class="todo-folder-items">--}}
{{--                        <div class="todo-folder-item">--}}
{{--                            <div class="flex justify-center items-center">--}}
{{--                                <form class="grid grid-cols-1 gap-2 sm:w-5/6 sm:py-8">--}}
{{--                                    <div>--}}
{{--                                        <div class="font-bold text-lg mb-4">Имя пользователя</div>--}}
{{--                                        <div class="todo-input col-span-full mb-4"><input--}}
{{--                                                placeholder="Введите ваше имя"></div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="font-bold text-lg mb-4">E-mail</div>--}}
{{--                                        <div class="todo-input col-span-full mb-4"><input--}}
{{--                                                placeholder="Введите ваш E-mail"></div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="font-bold text-lg mb-4">Пароль</div>--}}
{{--                                        <div class="todo-input col-span-full mb-4"><input--}}
{{--                                                placeholder="Введите ваш пароль"></div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="font-bold text-lg mb-4">Подтвердить пароль</div>--}}
{{--                                        <div class="todo-input col-span-full mb-4"><input--}}
{{--                                                placeholder="Повторите ваш пароль"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-span-full flex justify-center pt-8"><a href="#"--}}
{{--                                                                                           class="btn btn-long todo-secondary-inverted-outlined btn-rounded">Добавить</a>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="w-screen h-screen bg-primary bg-opacity-70 block top-0 fixed z-10 lg:hidden"></div>--}}
{{--    @include('layouts.includes.left_menu_profile')--}}
{{--    <div class="z-10 relative"></div>--}}
@endsection
