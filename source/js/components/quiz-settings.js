import {disableScroll} from "../functions/disable-scroll";
import {enableScroll} from "../functions/enable-scroll";
import {removeCustomClass, toggleCustomClass} from "../functions/customFunctions";

const QuizModalManager = {
    activeClass: 'active',
    modals: {},
    overlay: document.querySelector(".overlay"),
    menu: document.querySelector(".option-menu"),
    submenu: null,
    init() {
        this.submenu = this.menu?.querySelector('.option-menu__wrapp');

        this.bindMenuTriggers();
        this.bindOverlayClose();
        this.registerModals([
            { trigger: '[data-exit]', modalClass: 'leave' },
            { trigger: '[data-continue]', modalClass: 'continue' },
            { trigger: '[data-choice]', modalClass: 'choice' },
        ]);
    },

    bindMenuTriggers() {
        const openBtns = document.querySelectorAll('.section-quiz__setting:not(.close-btn)');
        const langBtn = document.querySelector('.option-menu__lang');
        const closeBtn = this.menu?.querySelector('.option-menu__close');
        const backBtn = this.menu?.querySelector('.option-menu__back');

        openBtns.forEach(btn => {
            btn.addEventListener('click', () => this.openMenu());
        });

        closeBtn?.addEventListener('click', () => this.closeMenu());
        backBtn?.addEventListener('click', () => this.closeSubmenu());

        langBtn?.addEventListener('click', () => {
            if (this.menu?.classList.contains(this.activeClass)) {
                toggleCustomClass(this.submenu, this.activeClass);
            }
        });
    },

    bindOverlayClose() {
        this.overlay?.addEventListener('click', () => {
            this.closeMenu();
            this.closeAllModals();
        });
    },

    registerModals(configs) {
        configs.forEach(({ trigger, modalClass }) => {
            const triggers = document.querySelectorAll(trigger);
            const modal = document.querySelector(`.section-quiz__modal.${modalClass}`);
            if (!triggers.length || !modal) return;

            this.modals[modalClass] = modal;

            const closeBtns = modal.querySelectorAll('.close-btn');

            triggers.forEach(t => {
                t.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.closeMenu();
                    this.open(modalClass);
                });
            });

            closeBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.close(modalClass);
                });
            });
        });
    },

    open(modalClass) {
        const modal = this.modals[modalClass];
        if (!modal) return;

        modal.classList.add(this.activeClass);
        this.overlay?.classList.add(this.activeClass);
        disableScroll();
    },

    close(modalClass) {
        const modal = this.modals[modalClass];
        if (!modal) return;

        modal.classList.remove(this.activeClass);
        this.overlay?.classList.remove(this.activeClass);
        enableScroll();
    },

    closeAllModals() {
        Object.values(this.modals).forEach(modal => modal.classList.remove(this.activeClass));
        this.overlay?.classList.remove(this.activeClass);
        enableScroll();
    },

    openMenu() {
        toggleCustomClass(this.menu, this.activeClass);
        toggleCustomClass(this.overlay, this.activeClass);
        disableScroll();
    },

    closeMenu() {
        removeCustomClass(this.menu, this.activeClass);
        removeCustomClass(this.overlay, this.activeClass);
        removeCustomClass(this.submenu, this.activeClass);
        enableScroll();
    },

    closeSubmenu() {
        removeCustomClass(this.submenu, this.activeClass);
    },

};

export default QuizModalManager
