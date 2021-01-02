/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('test-component', require('./components/TestComponent.vue').default);
Vue.use(require('vue-moment'));
Vue.directive('resize', resize);
Vue.config.delimiters = ['<%', '%>']
import Vue from 'vue';
//
import vuescroll from 'vue-scroll';

Vue.use(vuescroll)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import resize from 'vue-resize-directive';
//
import ClickOutside from 'vue-click-outside';
//
import ChatWindow from 'vue-advanced-chat';

const mainMenu = {
    data: {
        mainMenu: [
            {
                title: 'Главная',
                href: '/',
                active: true,
            },
            {
                title: 'Мои планы',
                href: '/plans',
                active: false,
            },
            {
                title: 'Графики',
                href: '#',
                active: false,
            },
            {
                title: 'Чат',
                href: '/chat',
                active: false,
            },
            {
                title: 'О проекте',
                href: '#',
                active: false,
            },
        ],
        mainUserMenu: false,
    },
};

const moment= require('moment')
moment.locale('ru')
const calendar = {
    data: {
        calDate: moment(),
        calTheme: 'dark',
        transition: 'left',
    },
    computed: {
        days() {
            return moment.weekdaysShort(true);
        },
        calTitle() {
            return this.calDate.format('MMMM YYYY');
        },
        startOfMonth() {
            let start = moment(this.calDate).startOf('month');
            start = start.startOf('week');
            return start;
        },
        endOfMonth() {
            let end = moment(this.calDate).endOf('month');
            end = end.endOf('week');
            return end;
        },
        dates() {
            return this.calcDates(this.calDate);
        },
        datesNext() {
            return this.calcDates(this.calDate.clone().add(1, 'M'));
        },
        datesPrev() {
            return this.calcDates(this.calDate.clone().subtract(1, 'M'));
        },
    },
    mounted() {
    },
    methods: {
        calNext() {
            this.transition = 'left';
            this.calDate = moment(this.calDate).add(1, 'M');
        },
        calPrev() {
            this.transition = 'right';
            this.calDate = moment(this.calDate).subtract(1, 'M');
        },
        calcDates(currentDate) {
            const dates = [];
            let date = this.startOfMonth;
            while (date <= this.endOfMonth) {
                dates.push(date.month() === currentDate.month() ? date.date() : '');
                date = date.clone().add(1, 'd');
            }
            return dates;
        },
        calBefore(el) {
            el.style.position = 'absolute';
            el.style.width = '100%';
        },
        calAfterEnter(el) {
            const parent = el.parentElement;
            if (parent) el.parentElement.style.height = null;
            this.calAfter(el);
        },
        calAfter(el) {
            el.style.position = 'unset';
            el.style.width = null;
        },
        calEnter(el, done) {
            const parent = el.parentElement;
            if (parent) {
                const h = window.getComputedStyle(parent).getPropertyValue("height");

                parent.style.height = h;
            }
            this.calBefore(el);

            anime({
                targets: el,
                translateX: this.transition === 'left' ? ['100%', '0%'] : ['-100%', '0%'],
                // easing: 'linear',
                duration: 300,
                complete: done,
            })
        },
        calLeave(el, done) {
            anime({
                targets: el,
                translateX: this.transition === 'left' ? ['0%', '-100%'] : ['0%', '100%'],
                // easing: 'linear',
                duration: 300,
                complete: done,
            })
        },
    },
};

const accordeon = {
    data() {
        return {
            accordeons: [true, false, false],
        };
    },
    methods: {
        accBeforeEnter (el) {
            el.style.maxHeight = '0px'
        },
        accEnter (el) {
            el.style.maxHeight = el.scrollHeight + 'px'
        },
        accLeave (el) {
            el.style.maxHeight = '0'
        }
    },
}

const bottomBar = {
    data() {
        return {
            botBarProjMenu: false,
            botBarDateMenu: false,
        };
    },
};

const tabs = {
    data() {
        return {
            tabsMenu1: [
                {
                    title: 'Лента',
                    href: '/plans.html'
                },
                {
                    title: 'Проекты',
                    href: '/projects.html'
                },
                {
                    title: 'Выполнено',
                    href: '#',
                },
            ],
            tabsMenu2: [
                {
                    title: 'Все',
                    href: '/chat.html'
                },
                {
                    title: 'Группы',
                    href: '#'
                },
                {
                    title: 'Приватные',
                    href: '#',
                },
            ],
        };
    },
    computed: {
        tabsMenu() {
            return this.appRouteActive('/chat.html') ? this.tabsMenu2 : this.tabsMenu1;
        }
    }
}

const common = {
    methods: {
        appRouteActive(href) {
            return window.location.pathname === href;
        },
    },
};

const doIfOther = (el, binding) => (e) => {
    if (!el.contains(e.target) && el !== e.target) {
        binding()
    }
}

const clickOutside = {
    // call the binded callback if click not on yourself element
    inserted: (el, binding) => {
        window.addEventListener('click', doIfOther(el, binding.value))
    },
    unbind: (el, binding) => {
        window.removeEventListener('click', doIfOther(el, binding.value))
    }
}

const scroll = {
    inserted: (el, binding) => {
        window.addEventListener('scroll', binding.value)
    },
    unbind: (el, binding) => {
        window.removeEventListener('scroll', binding.value)
    }
}

const app = new Vue({
    mixins: [mainMenu, calendar,accordeon,bottomBar,tabs,common,clickOutside,scroll,resize],
    el: '#app',
    data() {
        return {
            projCreateContent: false,
            projCreate: false,
            projCreateTitle: '',


            profFields: [
                {
                    title: 'Имя пользователя',
                    placeholder: 'Иван',
                    description: '*виден только вам',
                },
                {
                    title: 'Фамилия пользователя',
                    placeholder: 'Иванов',
                    description: '*виден только вам',
                },
                {
                    title: 'Логин пользователя',
                    placeholder: 'Nickname',
                    description: '*виден только вам',
                },
                {
                    title: 'Старый пароль',
                    placeholder: '*********************',
                    description: '',
                },
                {
                    title: 'E-mail пользователя',
                    placeholder: 'IvanIvanov@gmail.com',
                    description: '',
                },
                {
                    title: 'Новый пароль',
                    placeholder: '*********************',
                    description: '',
                },
            ],

            calTheme: 'light',
            createTask: false,
            createTaskContent: false,
            editTaskTitle: '',
            chatMessages: [],
            addUsersContent: false,
            addUsers: false,
            addUsersTitle: '',
            authType: true,
            drawer: true,
            mobile: false,
            mobileBreakpoint: 1024,
            drawerMenu: [
                {
                    title: 'Мои планы',
                    href: '/plans',
                },
                {
                    title: 'Графики',
                    href: '#',
                },
                {
                    title: 'Чат',
                    href: '/chat',
                },
                {
                    title: 'О проекте',
                    href: '#',
                },
                {
                    title: 'Мой профиль',
                    href: '/profile',
                },
                {
                    title: 'Авторизация',
                    href: '/authorization',
                },
            ],
        };
    },
    created() {
        this.resize();
    },
    mounted() {
        this.resize();
    },
    methods: {
        resize() {
            this.calcMobile();
            document.documentElement.style.setProperty('--screen-height', `${window.innerHeight}px`);
            // console.log('resize', this.drawer, this.mobile, window.innerWidth);
        },
        calcMobile() {
            this.mobile = window.innerWidth < this.mobileBreakpoint;
            this.drawer = !this.mobile;
        },
    },
});
