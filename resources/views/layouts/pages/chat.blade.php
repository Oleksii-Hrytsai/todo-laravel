
    <div class="w-full h-full relative" id="app" v-resize="resize">
        <div class="min-h-screen flex flex-col transition-all ease-in-out duration-300 relative"
             :class="{        'lg:ml-80': drawer,      }">
            @include('layouts.includes.profile_drownDown')
            <div class="pt-24">
                <div class="bg-white flex h-screen -mt-24">
                    <div class="flex-none w-full bg-white pt-24 hidden sm:w-5/12 sm:block">
                        <div class="flex flex-col h-full relative border-r border-grayBg">
                            <div class="flex-none h-20">
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
                            <div class="flex-1 overflow-y-auto">
                                <div class="space-y-0.5">
                                    <div class="flex p-4 bg-white transition-all hover:bg-grayBg"
                                         v-for="(item, i) in Array(18)" :key="i">
                                        <div class="todo-user-icon-xl flex-initial mr-8 mt-4"
                                             :class="{        'online': [0, 3, 5, 6, 7].includes(i),        'many': [0, 3].includes(i),      }"></div>
                                        <div class="flex-1">
                                            <div class="text-lg font-bold">Георгий</div>
                                            <div class="text-gray text-sm">Здравствуйте, запланируем встречу на 28.09</div>
                                        </div>
                                        <div class="flex flex-col justify-between items-end">
                                            <div class="text-gray text-xs">23 июля 2020</div>
                                            <div class="rounded-full bg-link w-6 h-6 text-center py-1 text-white"
                                                 v-if="[0, 1].includes(i)">
                                                <div class="text-xs">21</div>
                                            </div>
                                            <i class="icon" v-else
                                               :class="{          'icon-msg-readed': [1, 2, 5, 3].includes(i),          'icon-msg-sended': [4, 7].includes(i),        }"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-0 h-24 w-full">
                                <div class="flex justify-center"><a
                                        class="btn btn-long btn-rounded btn-link relative shadow-lg" href="#"
                                        @click.prevent="addUsers = true, addUsersTitle = 'Добавьте чат:'"><i
                                            class="icon icon-plus transform absolute left-4"></i>
                                        <div>Новый чат</div>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-none pt-24 w-full sm:w-7/12">
                        <div class="h-full relative">
                            <div class="h-20 border-b border-grayBg absolute top-0 w-full shadow-md z-10">
                                <div class="flex p-4 bg-white items-center">
                                    <div class="todo-user-icon-xl online flex-initial mr-4"></div>
                                    <div class="flex-1">
                                        <div class="text-lg font-bold">Георгий</div>
                                        <div class="text-gray text-sm">В сети</div>
                                    </div>
                                    <div class="items-end"><a
                                            class="block rounded-full border border-grayDarken w-6 h-6 py-1 transition-all hover:bg-grayBg"
                                            href="#"><i class="icon icon-sm icon-plus-gray-darken mx-auto"></i></a></div>
                                </div>
                            </div>
                            <div class="h-full overflow-y-auto todo-chat-bg py-20" ref="todo-chat-roll">
                                <div class="min-h-full flex flex-col justify-end px-4 py-14 space-y-2 sm:px-8">
                                    <div class="todo-msg todo-msg-left">
                                        <div class="todo-msg-item">
                                            <div>Здравствуйте, запланируем встречу на 28.09</div>
                                            <div class="todo-msg-time">10:20</div>
                                        </div>
                                    </div>
                                    <div class="todo-msg todo-msg-left">
                                        <div class="todo-msg-item">
                                            <div>Здравствуйте, запланируем встречу на 28.09</div>
                                            <div class="todo-msg-time">10:20</div>
                                        </div>
                                    </div>
                                    <div class="todo-msg todo-msg-right">
                                        <div class="todo-msg-item">
                                            <div>Здравствуйте, Георгий! Договорились</div>
                                            <div class="todo-msg-time">10:20</div>
                                        </div>
                                    </div>
                                    <div class="todo-msg todo-msg-left">
                                        <div class="todo-msg-item">
                                            <div>Здравствуйте, запланируем встречу на 28.09</div>
                                            <div class="todo-msg-time">10:20</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-20 absolute bottom-0 w-full bg-white shadow-md border-t border-grayBg">
                                <div class="flex items-center justify-between h-full px-8">
                                    <div class="flex items-center flex-1 mr-4"><a class="btn-icon mr-4" href="#"><i
                                                class="icon icon-clip"></i></a>
                                        <div class="flex-1"><input class="outline-none w-full"
                                                                   placeholder="Введите сообщение..."></div>
                                    </div>
                                    <a class="rounded-full bg-secondary w-10 h-10 items-center transition-all flex hover:bg-opacity-80"
                                       href="#"><i class="icon icon-arrow-up mx-auto h-4 w-4"></i></a></div>
                                <div class="absolute bottom-full">
                                    <div class="text-sm p-4 text-grayDarken">Георгий набирает сообщение...</div>
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

