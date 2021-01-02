@extends('layouts.app')
@section('content')
    <div class="w-full h-full" id="app">
        <div class="todo-appbar">
            <div class="px-4 mx-auto w-full h-full flex justify-between lg:container">
                <div class="flex items-center">
                    <div class="todo-logo"></div>
                </div>
                <div class="h-full flex-initial">
                    <ul class="h-full flex items-center space-x-4 font-bold text-white overflow-ellipsis max-w-full">
                        <li class="hidden md:block" v-for="(item, i) in mainMenu" :key="i"><a
                                class="rounded-full px-8 py-2 transition-all" :href="item.href"
                                :class="{              'hover:bg-white hover:bg-opacity-20': !item.active,              'bg-white': item.active,              'text-primary': item.active,            }"><% item.title %></a>
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
            </div>
        </div>
        <div class="min-h-screen">
            <div class="todo-landing-wrapper todo-index-bg min-h-screen">
                <section class="px-4 mx-auto my-4 sm:my-8 lg:container">
                    <div class="flex justify-between items-center flex-wrap -m-4">
                        <div class="flex-none w-full p-4 sm:flex-1 sm:w-auto">
                            <div class="text-white text-4xl font-bold">Привет, Nickname!</div>
                            <div class="mt-3 text-white font-bold">Проверь запланированные дела на сегодня и внеси новые
                            </div>
                        </div>
                        <div class="flex-none w-full p-4 justify-center sm:flex-0 sm:w-auto sm:justify-end"><a
                                class="btn rounded-full todo-white-inverted-outlined mx-auto max-w-min" href="/plans">Запланировать</a>
                        </div>
                    </div>
                </section>
                <section class="px-4 mx-auto mt-8 sm:mt-16 lg:container">
                    <div class="flex flex-wrap -m-4">
                        <div class="lg:order-first order-last lg:w-3/12 w-full p-4 flex-none">
                            <div class="todo-folder">
                                <div class="todo-folder-title">
                                    <div class="text-2xl">Ваши проекты</div>
                                    <a class="block flex items-center rounded-full w-10 h-10 transition-all hover:bg-white hover:bg-opacity-20"
                                       href="#"><i class="icon icon-plus mx-auto"></i></a></div>
                                <div class="todo-folder-items">
                                    <div class="todo-folder-item hovered">
                                        <div class="flex justify-between items-center">
                                            <div>20.12 - 5.01</div>
                                            <div class="todo-user-icons">
                                                <div class="todo-user-icon"></div>
                                                <div class="todo-user-icon"></div>
                                                <div class="todo-user-icon"></div>
                                            </div>
                                        </div>
                                        <div class="text-2xl font-bold">Проект 1</div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing</div>
                                    </div>
                                    <div class="todo-folder-item active">
                                        <div class="flex justify-between items-center">
                                            <div>20.12 - 5.01</div>
                                            <i class="icon icon-lock"></i></div>
                                        <div class="text-2xl font-bold">Проект 1</div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing</div>
                                    </div>
                                    <div class="todo-folder-item hovered">
                                        <div class="flex justify-between items-center">
                                            <div>20.12 - 5.01</div>
                                            <div class="todo-user-icons">
                                                <div class="todo-user-icon"></div>
                                                <div class="todo-user-icon"></div>
                                                <div class="todo-user-icon"></div>
                                                <div class="todo-user-icon"></div>
                                            </div>
                                        </div>
                                        <div class="text-2xl font-bold">Проект 1</div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/2 lg:flex-1 p-4 w-full flex-none">
                            <div class="rounded-2xl">
                                <div class="todo-today-card">
                                    <div
                                        class="py-16 px-8 text-4xl text-white font-bold transition-all ease-out duration-500 hover:py-20">
                                        Планы<br>На Сегодня
                                    </div>
                                </div>
                                <div class="todo-folder">
                                    <div class="todo-folder-title">
                                        <div class="w-3/6 flex"><i class="icon icon-clock mr-4"></i>
                                            <div class="font-bold">10:00-11:00</div>
                                        </div>
                                        <div class="w-3/6 flex"><i class="icon icon-calendar mr-4"></i>
                                            <div class="font-bold">Мария, 12 июля 2020</div>
                                        </div>
                                    </div>
                                    <div class="todo-folder-items">
                                        <div class="todo-folder-item">
                                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                                esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-1/2 lg:w-3/12 w-full p-4 flex-none">
                            <div class="flex flex-wrap -m-4">
                                <div class="flex-none w-full p-4">
                                    <div class="todo-folder"
                                         :class="{    'todo-folder-light': calTheme === 'light',  }">
                                        <div class="todo-folder-title"><a
                                                class="rounded-full bg-white bg-opacity-20 transition-all hover:shadow-lg hover:bg-opacity-50 p-2.5"
                                                href="#" @click.prevent="calPrev"><i class="icon icon-sm"
                                                                                     :class="{[calTheme === 'light' ? 'icon-left-secondary' : 'icon-left']: true}"></i></a>
                                            <div class="text-2xl text-center"><% calTitle %></div>
                                            <a class="block rounded-full bg-white bg-opacity-20 transition-all hover:shadow-lg hover:bg-opacity-50 p-2.5"
                                               href="#" @click.prevent="calNext"><i class="icon icon-sm"
                                                                                    :class="{[calTheme === 'light' ? 'icon-right-secondary' : 'icon-right']: true}"></i></a>
                                        </div>
                                        <div class="todo-folder-items">
                                            <div class="todo-folder-item text-sm font-bold">
                                                <div class="grid grid-cols-7 gap-4 text-secondary">
                                                    <div class="text-center" v-for="(day, i) in days"
                                                         :key="i"><% day %>
                                                    </div>
                                                </div>
                                                <div class="overflow-hidden relative">
                                                    <transition :css="false" @after-enter="calAfterEnter"
                                                                @before-leave="calBefore" @after-leave="calAfter"
                                                                @enter="calEnter" @leave="calLeave">
                                                        <div class="grid grid-cols-7 gap-1" :key="calTitle">
                                                            <div v-for="(date, i) in dates" :key="i">
                                                                <div class="todo-calendar-day" v-if="date"
                                                                     :class="{                  'event-primary': date === 15,                  'event-secondary': date === 21,                  'active': date === 24,                  'event-link': date === 27,                }">
                                                                    <% date %>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </transition>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-none w-full p-4">
                                    <div class="rounded-2xl text-primary">
                                        <div
                                            class="flex justify-between items-center py-8 px-4 pb-4 bg-white rounded-t-2xl">
                                            <div class="font-bold text-2xl">Групповой чат</div>
                                            <a class="block bg-secondary rounded-full w-8 h-8 flex items-center transition-all hover:bg-opacity-80"
                                               href="#"><i class="icon w-4 h-4 icon-plus-bold m-auto"></i></a></div>
                                        <div class="space-y-0.5">
                                            <div class="flex items-center p-4 bg-white transition-all hover:bg-grayBg">
                                                <div class="todo-user-icon-xl flex-initial mr-4"></div>
                                                <div class="flex-1">
                                                    <div class="text-lg font-bold">Proyek Jangka Panjang</div>
                                                    <div class="text-gray">Samantha, Sole, Rufai</div>
                                                </div>
                                            </div>
                                            <div class="flex items-center p-4 bg-white transition-all hover:bg-grayBg">
                                                <div class="todo-user-icon-xl flex-initial mr-4"></div>
                                                <div class="flex-1">
                                                    <div class="text-lg font-bold">Proyek Jangka Panjang</div>
                                                    <div class="text-gray">Samantha, Sole, Rufai</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-2 bg-white rounded-b-2xl"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
