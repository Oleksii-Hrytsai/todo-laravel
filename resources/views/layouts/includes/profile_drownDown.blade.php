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
