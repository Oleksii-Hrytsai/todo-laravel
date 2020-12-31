@extends('layouts.app')

@section('content')
    <div class="w-full h-full relative" id="app" v-resize="resize">
        <div class="min-h-screen flex flex-col transition-all ease-in-out duration-300 relative"
             :class="{        'lg:ml-80': drawer,      }">
            @include('layouts.includes.profile_drownDown')
            <div class="pt-24">
                <div class="bg-white flex-1 min-h-screen -mt-24">
                    <div class="grid grid-cols-2 gap-4 p-4 md:mx-12 md:gap-x-12">
                        <div class="col-span-full">
                            <div class="flex justify-center">
                                <div class="py-8 md:pt-20 md:pb-14">
                                    <div class="todo-user-avatar mb-4"></div>
                                    <a class="block text-gray underline text-center" href="#">Сменить фото</a></div>
                            </div>
                        </div>
                        <div class="col-span-full sm:col-span-1" v-for="(item, i) in profFields" :key="i">
                            <div class="flex items-center mb-4 ml-4">
                                <div class="font-bold text-lg font-bold mr-8 text-grayDarken"><% item.title %></div>
                                <div class="text-sm text-gray"><%  item.description %></div>
                            </div>
                            <div class="todo-input col-span-full mb-4"><input :placeholder="item.placeholder"></div>
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
        <div class="z-10 relative"></div>
    </div>
@endsection
