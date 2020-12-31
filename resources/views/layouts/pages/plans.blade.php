@extends('layouts.app')
@section('content')
    <div class="w-full h-full relative" id="app" v-resize="resize">
        <div class="min-h-screen flex flex-col transition-all ease-in-out duration-300 relative"
             :class="{        'lg:ml-80': drawer,      }">
            @include('layouts.includes.profile_drownDown')
            <div class="pt-24">
                <div class="bg-white min-h-screen -mt-24 pt-24 pb-20">
                    <div class="flex justify-around mt-2 h-16">
                        <div class="relative h-full max-w-full">
                            <div class="absolute bottom-0 border-b-2 border-gray w-full"></div>
                            <div
                                class="flex font-bold text-center relative justify-center h-full overflow-x-auto lg:mx-8">
                                <a class="block px-8 transition-all flex items-center hover:border-link hover:border-opacity-70 hover:border-b-4"
                                   v-for="(item, i) in tabsMenu" :key="i" :href="item.href"
                                   :class="{['border-b-4 border-link']: appRouteActive(item.href)}">
                                    <div><% item.title %></div>
                                </a></div>
                        </div>
                    </div>
                    <div class="pr-2 my-16 space-y-8">
                        <div v-for="(item, i) in accordeons" :key="i"><a
                                class="block ml-4 mr-2 px-4 py-1 border-b border-grayDarken text-grayDarken" href="#"
                                @click.prevent="$set(accordeons, i, !accordeons[i])">- <% ['Просрочено', 'Сегодня',
                                'Завтра'][i] %></a>
                            <transition @before-enter="accBeforeEnter" @enter="accEnter" @leave="accLeave"
                                        enter-active-class="accordeon" leave-active-class="accordeon">
                                <div class="my-4" v-if="accordeons[i]">
                                    <div
                                        class="flex space-x-4 py-3 pr-2 items-center transition-all cursor-pointer hover:bg-linkLight"
                                        v-for="(item, ii) in Array(3).fill()" :key="ii" href="#"
                                        @click.prevent="(e) =&gt; {          if (!e.target.closest('[data-acc-item-menu]')) {            createTask = true;            editTaskTitle = 'Редактировать задачу:';          }        }">
                                        <div class="pl-4">
                                            <div class="todo-status-outlined-warning mx-2"></div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-primary text-base">Задача высокого приоритета</div>
                                            <div class="text-gray">Проект2</div>
                                        </div>
                                        <a class="w-8 h-8 rounded-full flex items-center transition-all hover:bg-grayBg"
                                           href="#" data-acc-item-menu>
                                            <div class="icon icon-menu h-4 w-4 mx-auto"></div>
                                        </a></div>
                                </div>
                            </transition>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed bottom-0 h-20 w-full" :class="{'sm:pl-80': drawer}">
            <div class="flex h-full items-center justify-between px-4 bg-grayBg relative"><a
                    class="block flex-1 items-center hidden sm:flex" href="#"
                    @click.prevent="      createTask = true,      editTaskTitle = 'Добавьте новую задачу:'    ">
                    <div class="todo-status-filled-link mx-4"></div>
                    <div class="text-gray px-4">Название задачи</div>
                </a>
                <div class="sm:hidden"></div>
                <div class="flex items-center space-x-4">
                    <div class="relative"><a
                            class="btn-small border border-gray text-gray transition-all hover:bg-white"
                            href="#" @click.prevent="botBarProjMenu = !botBarProjMenu"><i
                                class="icon icon-tiles"></i>
                            <div class="hidden sm:flex">Проект 1</div>
                        </a>
                        <transition name="fade">
                            <div
                                class="absolute bottom-full -right-12 mb-4 py-4 shadow-lg rounded-2xl bg-white border border-grayBg sm:right-0"
                                v-if="botBarProjMenu">
                                <ul class="w-40 divide-y divide-grayBg text-primary max-h-40 overflow-auto">
                                    <li v-for="(item, i) in Array(5)" :key="i"><a class="py-2 px-4 flex hover:bg-grayBg"
                                                                                  href="#"><i
                                                class="icon icon-corona mr-4"></i>
                                            <div>Проект <% i + 1 %></div>
                                        </a></li>
                                </ul>
                            </div>
                        </transition>
                    </div>
                    <div class="relative"><a
                            class="btn-small border border-gray text-gray transition-all hover:bg-white"
                            href="#" @click.prevent="botBarDateMenu = !botBarDateMenu"><i
                                class="icon icon-clock-gray"></i>
                            <div class="hidden sm:flex">15.07.2020</div>
                        </a>
                        <transition name="fade">
                            <div class="absolute bottom-full -right-12 mb-4 sm:right-0" v-if="botBarDateMenu">
                                <div class="w-96 p-4 shadow-lg rounded-2xl bg-white">
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
                                                    <div class="text-center" v-for="(day, i) in days" :key="i"><% day %>
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
                            </div>
                        </transition>
                    </div>
                    <a class="rounded-full bg-secondary w-10 h-10 items-center transition-all flex hover:bg-opacity-80"
                       href="#"><i class="icon icon-arrow-up mx-auto h-4 w-4"></i></a></div>
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
        <div class="z-10 relative">
            <transition name="fade" @before-enter="createTaskContent = true" @before-leave="createTaskContent = false">
                <div
                    class="fixed h-screen w-screen top-0 left-0 bg-primary bg-opacity-50 text-primary flex items-center"
                    @click.self="createTask = false" v-if="createTask">
                    <transition name="from-bottom">
                        <div
                            class="relative mx-auto bg-white p-8 min-h-full w-full overflow-auto max-h-full md:w-2/3 md:min-h-0 md:rounded-4xl"
                            v-if="createTaskContent">
                            <div class="p-4 font-bold text-2xl text-center"><% editTaskTitle %></div>
                            <form class="grid grid-cols-6 gap-5">
                                <div class="todo-input col-span-full"><input placeholder="Название задачи"></div>
                                <div class="todo-input col-span-full"><textarea
                                        placeholder="Описание задачи..."></textarea>
                                </div>
                                <div class="col-span-full md:col-span-3">
                                    <div class="font-bold text-lg mb-4">Выберите проект:</div>
                                    <div class="max-h-48 p-5 overflow-y-auto">
                                        <div
                                            class="rounded-xl bg-white py-4 shadow-lg border border-grayBg divide-y divide-grayBg">
                                            <a class="block px-9 py-2 font-normal transition-all hover:bg-grayBg"
                                               v-for="(item, i) in Array(6).fill()" :key="i" href="#">Проект <% i + 1
                                                %></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-full md:col-span-3">
                                    <div class="font-bold text-lg mb-4">Выберите приоритет:</div>
                                    <div class="flex space-x-5"><a
                                            v-for="(color, i) in ['error', 'warning', 'link', 'gray']" :key="i" href="#"
                                            :class="{                  [`todo-status-outlined-${color}`]: true,                }"></a>
                                    </div>
                                </div>
                                <div class="col-span-full flex justify-center pt-16"><a
                                        class="btn btn-long todo-secondary-inverted-outlined btn-rounded"
                                        href="#">Добавить</a></div>
                            </form>
                            <div class="absolute top-12 right-8"><a class="icon icon-close" href="#"
                                                                    @click.prevent="createTask = false"></a></div>
                        </div>
                    </transition>
                </div>
            </transition>
        </div>
    </div>
@endsection
